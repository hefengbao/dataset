<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Lyric;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseLyricApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lyric-api';

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
        $dataset = Dataset::where('model', 'Lyric')->first();

        $lyrics = Lyric::select(['id', 'title', 'writer', 'singer', 'content'])
            ->orderBy('id')
            ->get();

        Storage::put('api/歌词/chinese_lyrics_v' . $dataset->version . '.json', json_encode($lyrics, JSON_UNESCAPED_UNICODE));

        $this->info('结束');

        return self::SUCCESS;
    }
}
