<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Dictionary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * @deprecated
 */
class ChineseDictCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dict-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'dict-api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'Dictionary')->first();
        $start = 1;
        $page = 1;
        $limit = 7000;
        while ($start) {
            $dict = Dictionary::select('id', 'char', 'wubi', 'radical', 'stroke', 'pinyin', 'pinyin2', 'simple_explanation', 'explanation', 'loanword')
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)
                ->get();

            if (count($dict) < $limit) {
                $start = 0;
            } else {
                //$start += $limit;
                $start = $dict->last()->id + 1;
            }

            Storage::put('api/字典/dict/chinese_dict_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'data' => $dict,
                'next_page' => $start != 0 ? $page + 1 : null
            ], JSON_UNESCAPED_UNICODE));

            if ($start) {
                $page++;
            }

            $this->info($page);
        }

        $this->info('结束');
    }
}
