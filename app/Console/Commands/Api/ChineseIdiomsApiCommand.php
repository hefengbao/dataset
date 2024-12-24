<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Idiom2;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseIdiomsApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:idioms-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:idioms';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'Idiom2')->first();

        /* $idioms = Idiom::select('id', 'word', 'pinyin', 'explanation', 'example','derivation','first_word','first_letter')
             ->orderBy('id')
             ->get();*/
        $start = 1;
        $page = 1;
        $limit = 10000;
        while ($start) {
            $idioms = Idiom2::select('id', 'word', 'pinyin', 'abbr', 'explanation', 'source', 'quote', 'example', 'similar', 'opposite', 'usage', 'story', 'notice')
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)
                ->get();

            if (count($idioms) < $limit) {
                $start = 0;
            } else {
                $start = $idioms->last()->id + 1;
            }

            Storage::put('api/成语/chinese_idioms_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'data' => $idioms,
                'next_page' => $start != 0 ? $page + 1 : null
            ], JSON_UNESCAPED_UNICODE));

            if ($start) {
                $page++;
            }

            $this->info($page);
        }


        $this->info('结束');

        return self::SUCCESS;
    }
}
