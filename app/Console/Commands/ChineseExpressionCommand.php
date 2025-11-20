<?php

namespace App\Console\Commands;

use App\Models\ChineseExpression;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseExpressionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese-expression';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'chinese-expression';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = Storage::disk('public')->json('file/word.json');
        foreach ($data as $item){
            ChineseExpression::where('word', $item['word'])->update([
                'source' => $item['source'] ?? null,
                'quote' => $item['quote'] ?? null,
                'example' => $item['example'] ?? null,
                'similar' => $item['similar'] ?? null,
                'opposite' => $item['opposite'] ?? null,
                'story' => $item['story'] ?? null,
                'spelling' => $item['spelling'] ?? null,
            ]);

            $this->info($item['word']);
        }
    }
}
