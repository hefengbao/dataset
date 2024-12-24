<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Expression;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseExpressionsApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expression-api';

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
        $dataset = Dataset::where('model', 'Expression')->first();
        $start = 1;
        $page = 1;
        $limit = 40000;

        while ($start) {
            $expressions = Expression::select(['id', 'word', 'pinyin', 'abbr', 'explanation'])
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)
                ->get();

            if (count($expressions) < $limit) {
                $start = 0;
            } else {
                $start = $expressions->last()->id + 1;
            }

            Storage::put('api/词语/expression/chinese_expressions_v' . $dataset->version . '_' . $page . '.json', json_encode([
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
