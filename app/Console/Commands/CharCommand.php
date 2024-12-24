<?php

namespace App\Console\Commands;

use App\Models\Char;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CharCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:char';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入汉字';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*$arr = File::json(Storage::path('char_base.json'), true);

        foreach ($arr as $key => $item){
            Char::create([
                'id' => $item['index'],
                'char' => $item['char'],
                'strokes' => $item['strokes'],
                'pinyin' => $item['pinyin'],
                'radicals' => $item['radicals'],
                'frequency' => $item['frequency'],
                'structure' => $item['structure'] ?? null,
                'traditional' => $item['traditional'] ?? null,
                'variant' => $item['variant'] ?? null,
            ]);

            $this->info($item['char']);
        }*/

        $arr = File::json(Storage::path('char_detail.json'), true);

        foreach ($arr as $item) {
            $char = Char::where('char', $item['char'])->first();
            if ($char) {
                $char->update([
                    'pronunciations' => $item['pronunciations'],
                ]);
            } else {
                $this->error($item['char'] . '不存在');
            }
        }

        $this->info('结束');
    }
}
