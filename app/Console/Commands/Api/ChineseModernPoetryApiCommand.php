<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ModernPoetry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseModernPoetryApiCommand extends Command
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
        $dataset = Dataset::where('model', 'ModernPoetry')->first();

        $data = ModernPoetry::select('id', 'title', 'author', 'content', 'zhu', 'yi', 'shang', 'author_info')
            ->orderBy('id')
            ->get();

        Storage::put('api/现代诗歌/chinese_modern_poetry_v' . $dataset->version . '.json', json_encode($data, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
