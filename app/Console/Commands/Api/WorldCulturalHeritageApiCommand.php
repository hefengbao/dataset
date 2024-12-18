<?php

namespace App\Console\Commands\Api;

use App\Models\Proverb;
use App\Models\WorldCulturalHeritage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorldCulturalHeritageApiCommand extends Command
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
        $data = WorldCulturalHeritage::select('id', 'name', 'year', 'year2', 'level', 'address', 'image', 'content')
            ->orderBy('id')
            ->get();

        Storage::put('api/china_world_cultural_heritage.json', json_encode($data->map(function (WorldCulturalHeritage $item){
            $item->content = Str::markdown($item->content);
            return $item;
        }), JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
