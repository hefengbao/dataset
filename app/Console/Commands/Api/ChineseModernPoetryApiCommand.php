<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseModernPoetry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseModernPoetryApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_modernpoetry_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:诗歌';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_modernpoetry')->first();

        $data = ChineseModernPoetry::select('id', 'title', 'author', 'content', 'zhu', 'yi', 'shang', 'author_info')
            ->orderBy('id')
            ->get();

        Storage::put('api/诗歌/chinese_modernpoetry_v' . $dataset->version . '_1.json', json_encode([
            'total' => count($data),
            'data' => $data,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
