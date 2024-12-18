<?php

namespace App\Console\Commands;

use App\Models\Glossary;
use App\Models\People;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GlossaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:glossary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '典故';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = 11108;

        while ($id){
            try {
                $response = Http::retry(3,1000)->withHeaders(
                    [
                        'Accept-Language' => 'zh-hant'
                    ]
                )
                    ->get('https://open.cnkgraph.com/api/glossary/典故/' . $id);

                if ($response->successful()){
                    $data = $response->json();

                    Glossary::create($data);

                    $this->info($data['Id'] . ' ' . now()->format('Y-m-d H:I:s'));

                    $id ++;

                    sleep(3);
                }else{
                    $id ++;
                }
            }catch (\Exception $exception){
                $id ++;
            }
        }
    }
}
