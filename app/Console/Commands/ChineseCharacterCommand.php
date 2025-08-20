<?php

namespace App\Console\Commands;

use App\Models\ChineseCharacter;
use App\Models\ChineseExpression;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChineseCharacterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese-character';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '汉字处理';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$chars = File::json('storage/app/public/file/char_detail.json', JSON_THROW_ON_ERROR);
        /*$file = file(Storage::disk('public')->path('file/char_detail.json'));
        foreach ($file as $line) {
            $char = json_decode(Str::substr($line, 0, Str::length($line) - 2), true);
            $data['character'] = $char['char'];
            foreach ($char['pronunciations'] as $item) {
                $data['pinyin'] = $item['pinyin'];
                $data['explanations2'] = $item['explanations'];
                ChineseCharacter::create($data);
            }
            $this->info($char['char']);
        }*/

        $data = File::json('storage/app/public/file/word2.json', JSON_THROW_ON_ERROR);

        foreach ($data as $item) {
            ChineseCharacter::where('character', $item['word'])
                ->update([
                    'stroke' => $item['strokes'],
                    'radical' => $item['radicals']
                ]);
            $this->info($item['word']);
        }

        $file = file(Storage::disk('public')->path('file/chinese_unicode_table.txt'));
        foreach ($file as $line) {
            $array = explode(" ", $line);
            $array = collect($array)->filter(function ($item) { return $item != ""; })->flatten()->all();

            ChineseCharacter::where('character', $array[0])
                ->update([
                    'wubi' => $array[2],
                    'stroke' => $array[6],
                    'radical' => mb_substr($array[7], 0, 1)
                ]);
            $this->info($array[0]);
        }

        $file = file(Storage::disk('public')->path('file/新华字典（第12版）.csv'));
        foreach ($file as $index =>$line) {
            if ($index > 0){
                $array = explode(",", $line);

                ChineseCharacter::where('character', $array[1])
                    ->update([
                        'stroke' => $array[5],
                    ]);

                $characters = ChineseCharacter::where('character', $array[1])->get();
                if ($characters->isEmpty()) {
                    ChineseCharacter::create([
                        'character' => $array[1],
                        'character2' => $array[2],
                        'pinyin' => $array[3],
                        'explanations' => json_encode(explode('//', preg_replace('/\d+页/u', '另见', str_replace(["\n","\r","\r\n"],'',$array[6]))), JSON_UNESCAPED_UNICODE),
                        'stroke' => $array[5],
                    ]);
                }else{
                    if (count($characters) == 1) {
                        $characters[0]->update([
                            'character2' => $array[2],
                            'pinyin' => $array[3],
                            'explanations' => json_encode(explode('//', preg_replace('/\d+页/u', '另见', str_replace(["\n","\r","\r\n"],'',$array[6]))), JSON_UNESCAPED_UNICODE),
                        ]);
                    }else{
                        ChineseCharacter::where('character', $array[1])
                            ->where('pinyin', $array[3])
                            ->update([
                                'character2' => $array[2],
                                'explanations' => json_encode(explode('//', preg_replace('/\d+页/u', '另见', str_replace(["\n","\r","\r\n"],'',$array[6]))), JSON_UNESCAPED_UNICODE),
                            ]);
                        Log::info($array[1],$characters->toArray());
                    }

                }

                $this->info($array[1]);
            }
        }
    }
}
