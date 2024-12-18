<?php

namespace App\Console\Commands\Api;

use App\Models\AntitheticalCouplet;
use App\Models\Char;
use App\Models\Idiom;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AntitheticalCoupletApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:antithetical-couplet-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:antithetical-couplet';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $antitheticalCouplets = AntitheticalCouplet::select('id', 'body', 'description')
            ->orderBy('id')
            ->get();

        Storage::put('api/chinese_antithetical_couplet.json', json_encode($antitheticalCouplets, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
