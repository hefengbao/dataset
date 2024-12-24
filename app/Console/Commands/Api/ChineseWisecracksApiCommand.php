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
    protected $signature = 'app:chinese-wisecracks-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:chinese-wisecracks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'ChineseWisecrack')->first();

        $chinese_wisecracks = ChineseWisecrack::select('id', 'riddle', 'answer', 'first_word', 'first_letter')
            ->orderBy('id')
            ->get();

        Storage::put('api/歇后语/chinese_wisecracks_v' . $dataset->version . '.json', json_encode($chinese_wisecracks, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
