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
    protected $signature = 'app:world-cultural-heritage-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'world-cultural-heritage-api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'WorldCulturalHeritage')->first();

        $data = ChinaWorldCulturalHeritage::select('id', 'name', 'year', 'year2', 'level', 'address', 'image', 'content')
            ->orderBy('id')
            ->get();

        Storage::put('api/世界文化遗产/china_world_cultural_heritage_v' . $dataset->version . '.json', json_encode($data->map(function (ChinaWorldCulturalHeritage $item) {
            $item->content = Str::markdown($item->content);
            return $item;
        }), JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
