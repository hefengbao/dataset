<?php

namespace App\Console\Commands;

use App\Models\ClassicalLiteratureWriting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
        $id = 1508334;

        while ($id) {
            $response = Http::withOptions([
                'verify' => false
            ])
                ->retry(100, 30000)
                ->get('https://open.cnkgraph.com/api/writing/' . $id);

            if ($response->successful()) {
                $writing = $response->json('Writing');

                //Writing::where('id',$writing['Id'])->update($writing);
                ClassicalLiteratureWriting::create($writing);

                $this->info($writing['Id'] . ' ' . now()->format('Y-m-d H:i:s'));

                $id++;
                sleep(3);
            } else {
                $id = 0;
            }
        }

        $this->info('结束');
    }
}
