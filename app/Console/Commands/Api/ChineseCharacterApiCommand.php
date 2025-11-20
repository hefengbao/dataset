<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseCharacter;
use App\Models\Dataset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseCharacterApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_character_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:汉字';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_character')->first();
        $start = 1;
        $page = 1;
        $limit = 5000;

        $total = ChineseCharacter::count();

        while ($start) {
            $dict = ChineseCharacter::select('id', 'character', 'character2', 'pinyin', 'radical', 'stroke', 'wubi', 'explanations', 'explanations2')
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

            Storage::put('api/汉字/chinese_character_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'total' => $total,
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
