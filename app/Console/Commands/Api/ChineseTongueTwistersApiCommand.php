<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\TongueTwister;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseTongueTwistersApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tongue-twisters-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api：tongue_twisters';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'TongueTwister')->first();

        $tongue_twisters = TongueTwister::select(['id', 'title', 'content', 'content2'])
            ->orderBy('id')
            ->get();

        Storage::put('api/绕口令/chinese_tongue_twisters_v' . $dataset->version . '.json', json_encode($tongue_twisters, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
