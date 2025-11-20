<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseIdiom;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseIdiomApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_idiom_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:成语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_idiom')->first();

        $start = 1;
        $page = 1;
        $limit = 10000;
        $total = ChineseIdiom::count();
        while ($start) {
            $idioms = ChineseIdiom::select('id', 'word', 'pinyin', 'abbr', 'explanation', 'source', 'quote', 'example', 'similar', 'opposite', 'usage', 'story', 'notice')
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)
                ->get();

            if (count($idioms) < $limit) {
                $start = 0;
            } else {
                $start = $idioms->last()->id + 1;
            }

            Storage::put('api/成语/chinese_idiom_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'total' => $total,
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
