<?php

namespace App\Console\Commands\Api;

use App\Models\TongueTwister;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TongueTwistersApiCommand extends Command
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
        $tongue_twisters = TongueTwister::select(['id','title', 'content', 'content2'])
            ->orderBy('id')
            ->get();

        Storage::put('api/tongue_twisters.json', json_encode($tongue_twisters, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
