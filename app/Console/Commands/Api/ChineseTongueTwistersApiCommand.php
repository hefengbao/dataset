<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseTongueTwister;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseTongueTwistersApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_tonguetwister_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api：绕口令';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_tonguetwister')->first();

        $tongue_twisters = ChineseTongueTwister::select(['id', 'title', 'content', 'content2'])
            ->orderBy('id')
            ->get();

        Storage::put('api/绕口令/chinese_tonguetwister_v' . $dataset->version . '_1.json', json_encode([
                'total' => count($tongue_twisters),
                'data' => $tongue_twisters,
                'next_page' => null
            ]
            , JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
