<?php

namespace App\Console\Commands\Api;

use App\Models\AntitheticalCouplet;
use App\Models\Proverb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ProverbApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:proverb-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:proverb';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $proverbs = Proverb::select('id', 'content', 'tags')
            ->orderBy('id')
            ->get();

        Storage::put('api/proverbs.json', json_encode($proverbs, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
