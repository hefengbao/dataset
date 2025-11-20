<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseExpression;
use App\Models\Dataset;
use App\Models\Expression;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseExpressionApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_expression_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:词语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_expression')->first();
        $start = 1;
        $page = 1;
        $limit = 10000;

        $total = ChineseExpression::count();

        while ($start) {
            $expressions = ChineseExpression::select(['id', 'word', 'pinyin', 'abbr', 'explanation', 'source', 'quote', 'example', 'similar', 'opposite', 'usage', 'story', 'notice'])
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)
                ->get();

            if (count($expressions) < $limit) {
                $start = 0;
            } else {
                $start = $expressions->last()->id + 1;
            }

            Storage::put('api/词语/chinese_expression_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'total' => $total,
                'data' => $expressions,
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
