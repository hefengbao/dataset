<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseWisecrack;
use App\Models\Dataset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseWisecracksApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_wisecrack_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:歇后语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_wisecrack')->first();

        $chinese_wisecracks = ChineseWisecrack::select('id', 'riddle', 'answer', 'first_word', 'first_letter')
            ->orderBy('id')
            ->get();

        Storage::put('api/歇后语/chinese_wisecrack_v' . $dataset->version . '_1.json', json_encode([
            'total' => count($chinese_wisecracks),
            'data' => $chinese_wisecracks,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
