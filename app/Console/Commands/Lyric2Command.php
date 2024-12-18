<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Lyric2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lyric2-import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'lyric2 import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 1; $i <= 5; $i++) {

            $file = file(Storage::path('Lyrics/lyrics'.$i.'.json'));

            $arr = json_decode(implode('', $file), true);

            foreach ($arr as $key => $item){

                DB::table('lyric2s')->insert([
                    'name' => $item['name'],
                    'singer' => $item['singer'],
                    'lyric' => $this->lyric($item['lyric']),
                ]);

                $this->info($item['name']);
            }
        }
    }

    private function lyric(array $items): string
    {
        $str = '';

        foreach ($items as $key => $item){
            $str .= $item . PHP_EOL;
        }

        return $str;
    }
}
