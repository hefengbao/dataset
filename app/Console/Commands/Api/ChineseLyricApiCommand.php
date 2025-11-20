<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseLyric;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseLyricApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_lyric_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:lyric';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_lyric')->first();

        $lyrics = ChineseLyric::select(['id', 'title', 'writer', 'singer', 'content'])
            ->orderBy('id')
            ->get();

        Storage::put('api/歌词/chinese_lyric_v' . $dataset->version . '_1.json', json_encode([
            'total' => $lyrics->count(),
            'data' => $lyrics,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        $this->info('结束');

        return self::SUCCESS;
    }
}
