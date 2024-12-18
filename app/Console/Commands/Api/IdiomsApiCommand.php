<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Idiom;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class IdiomsApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:idioms-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:idioms';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $idioms = Idiom::select('id', 'word', 'pinyin', 'explanation', 'example','derivation','first_word','first_letter')
            ->orderBy('id')
            ->get();

        Storage::put('api/idioms.json', json_encode($idioms, JSON_UNESCAPED_UNICODE));

        $this->info('结束');

        return self::SUCCESS;
    }
}
