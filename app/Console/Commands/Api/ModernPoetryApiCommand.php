<?php

namespace App\Console\Commands\Api;

use App\Models\ModernPoetry;
use App\Models\Proverb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ModernPoetryApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:modern-poetry-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:modern-poetry';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = ModernPoetry::select('id', 'title', 'author', 'content', 'zhu', 'yi', 'shang', 'author_info')
            ->orderBy('id')
            ->get();

        Storage::put('api/chinese_modern_poetry.json', json_encode($data, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
