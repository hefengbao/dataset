<?php

namespace App\Console\Commands\Api;

use App\Models\Char;
use App\Models\Lyric;
use App\Models\TongueTwister;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LyricApiCommand extends Command
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
        $lyrics = Lyric::select(['id', 'title', 'writer', 'singer', 'content'])
            ->orderBy('id')
            ->get();

        Storage::put('api/lyrics.json', json_encode($lyrics, JSON_UNESCAPED_UNICODE));

        $this->info('结束');

        return self::SUCCESS;
    }
}
