<?php

namespace App\Console\Commands;

use App\Models\ChineseCharacter;
use App\Models\ChineseExpression;
use App\Models\CookIngredient;
use App\Models\ChineseIdiom;
use App\Models\ClassicalLiteraturePeople;
use App\Models\ChineseProverb;
use App\Models\ChinaWorldCulturalHeritage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        /*for ($i = 1; $i <= 13; $i++) {
            $data = File::json('storage/app/public/file/classical_literature_people_v2_'.$i.'.json', JSON_THROW_ON_ERROR);
            foreach ($data['data'] as $item) {
                if (! People::find($item['Id'])) {
                    People::create($item);
                    $this->info($item['Id']);
                }
            }
        }*/
        /*$data = File::json('storage/app/public/file/classical_literature_sentences_v3.json', JSON_THROW_ON_ERROR);
        DB::table('poem_sentences')->insert($data);*/
        /*$words = File::json('storage/app/public/file/word.json', JSON_THROW_ON_ERROR);
        $words = collect($words);*/

        /*$data = DB::connection('mysql')->table('single_character_info')->get();
        $this->info(count($data));*/

        /*$file = file(Storage::disk('public')->path('file/large_pinyin.txt'));
        foreach ($file as $line) {
            if (!Str::startsWith($line, "#") ){
                $arr = explode(':', $line);
                if ($data = $words->where('word', trim($arr[0]))->first()) {
                    unset($data['abbr']);
                    $data['word2'] = mb_substr($arr[0], 0 ,1);
                    $arr2 = explode(' ', trim($arr[1]));
                    $data['pinyin2'] = trim($arr2[0]);
                }else{
                    $data['word'] = trim($arr[0]);
                    $data['pinyin'] = trim($arr[1]);
                    $data['word2'] = mb_substr($arr[0], 0 ,1);

                    $arr2 = explode(' ', trim($arr[1]));
                    $data['pinyin2'] = trim($arr2[0]);
                }

                ChineseExpression::create($data);
                $this->info($data['word']);
            }
        }*/
         $characters = ChineseCharacter::get();

         $item  = [];

         foreach ($characters as $character) {
            if ($character->explanations2 && count($character->explanations2)){
                foreach ($character->explanations2 as $explanation){
                    foreach ($explanation as $key => $value){
                        if (! in_array($key, $item)){
                            $item[] = $key;
                            $this->info($key);
                            $this->info(json_encode($value, JSON_UNESCAPED_UNICODE));
                        }
                    }
                }
            }
         }

         dd($item);
    }
}
