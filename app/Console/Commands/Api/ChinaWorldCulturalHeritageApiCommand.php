<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChinaWorldCulturalHeritage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChinaWorldCulturalHeritageApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:china_worldcultureheritage_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '世界遗产名录';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'china_worldcultureheritage')->first();

        $data = ChinaWorldCulturalHeritage::select('id', 'name', 'year', 'year2', 'type', 'level', 'address', 'image', 'content')
            ->orderBy('id')
            ->get();

        Storage::put('api/世界遗产名录/china_worldcultureheritage_v' . $dataset->version . '_1.json', json_encode([
            'total' => count($data),
            'data' => $data,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
