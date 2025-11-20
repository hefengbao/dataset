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
    protected $signature = 'app:chinese_antitheticalcouplet_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:对联';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_antitheticalcouplet')->first();

        $antitheticalCouplets = ChineseAntitheticalCouplet::select('id', 'body', 'description')
            ->orderBy('id')
            ->get();

        Storage::put('api/对联/chinese_antitheticalcouplet_v' . $dataset->version . '_1.json', json_encode([
            'total' => $antitheticalCouplets->count(),
            'data' => $antitheticalCouplets,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
