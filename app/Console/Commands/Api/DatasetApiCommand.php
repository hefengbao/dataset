<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DatasetApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dataset-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:dataset';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::select('id', 'name', 'count', 'version')
            ->orderBy('id')
            ->get();

        Storage::put('api/dataset_v2.json', json_encode($dataset, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
