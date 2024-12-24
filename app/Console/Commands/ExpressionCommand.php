<?php

namespace App\Console\Commands;

use App\Models\Expression;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ExpressionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expression';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入词语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $arr = File::json(Storage::path('expression.json'), true);

        foreach ($arr as $key => $item) {
            Expression::create([
                'word' => $item['word'],
                'pinyin' => $item['pinyin'],
                'abbr' => $item['abbr'] ?? null,
                'explanation' => $item['explanation'] ?? null,
            ]);

            $this->info($item['word']);
        }

        $this->info('结束');
    }
}
