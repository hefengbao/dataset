<?php

namespace App\Console\Commands;

use App\Models\People;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PeopleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:people';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '人物信息';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = 1;

        while ($id){
            $response = Http::withOptions([
                    'verify' => false
                ])
                ->retry(3,1000)
                ->get('https://open.cnkgraph.com/api/people/' . $id);

            if ($response->successful()){
                $data = $response->json('Person.Profile');
                $data['Details'] = $response->json('Person.Details');

                People::firstOrCreate(
                    [
                        'Id' => $data['Id']
                    ],
                    $data
                );

                $this->info($data['Id'] . ' ' . now()->format('Y-m-d H:I:s'));

                $id ++;

                sleep(1);
            }else{
                $id = 0;
            }
        }
    }
}
