<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseAntitheticalCouplet;
use App\Models\Dataset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseAntitheticalCoupletApiCommand extends Command
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
        $dataset = Dataset::where('model', 'AntitheticalCouplet')->first();

        $antitheticalCouplets = ChineseAntitheticalCouplet::select('id', 'body', 'description')
            ->orderBy('id')
            ->get();

        Storage::put('api/对联/chinese_antithetical_couplet_v' . $dataset->version . '.json', json_encode($antitheticalCouplets, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
