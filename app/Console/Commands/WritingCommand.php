<?php

namespace App\Console\Commands;

use App\Models\Writing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\LazyCollection;

class WritingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:writing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '知识图谱';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = 1373222;

        while ($id){
            $response = Http::withOptions([
                'verify' => false
            ])
                ->retry(10,1000)
                ->get('https://open.cnkgraph.com/api/writing/' . $id);

            if ($response->successful()){
                $writing = $response->json('Writing');

                //Writing::where('id',$writing['Id'])->update($writing);
                Writing::create($writing);

                $this->info($writing['Id'] . ' ' . now()->format('Y-m-d H:i:s'));

                $id ++;
                sleep(1);
            }else{
                $id = 0;
            }
        }

        $this->info('结束');
    }
}
