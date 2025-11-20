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
        //2297
        //2442
        //3889
         //$characters = ChineseCharacter::where('explanations2','like', '%[[%')->get();
         /*$characters = ChineseCharacter::whereIn('id', [2297,2442,3889])->get();
         foreach ($characters as $character) {
             $this->info(json_encode($character, JSON_UNESCAPED_UNICODE));
             $explanations2 = $character->explanations2;
             $temp = [];
             foreach ($explanations2 as $explanation) {
                 $explanation->words =  ($explanation->words)[0];
                 $temp[] = $explanation;
             }
             //$this->info(json_encode($temp, JSON_UNESCAPED_UNICODE));
             $character->update([
                 'explanations2' => $temp
             ]);
         }*/
        //dd(ChineseCharacter::find(4517));
        /*$characters = ChineseCharacter::get();
        foreach ($characters as $character) {
            $this->info(json_encode($character, JSON_UNESCAPED_UNICODE));
            if ($character->stroke){
                $character->update([
                    'stroke' => (int)$character->stroke
                ]);
                $this->info($character->character);
            }
        }*/

        //dd(ChineseExpression::find(509));

        /*$expressions = ChineseExpression::get();
        foreach ($expressions as $expression){
            $data  = [];
            if ($expression->source != null && is_string($expression->source)){
                $data['source'] = json_decode($expression->source);
            }
            if ($expression->quote != null && is_string($expression->quote)){
                $data['quote'] = json_decode($expression->quote);
            }
            if ($expression->example != null && is_string($expression->example)){
                $data['example'] = json_decode($expression->example);
            }
            if ($expression->similar != null && is_string($expression->similar)){
                $data['similar'] = json_decode($expression->similar);
            }
            if ($expression->opposite != null && is_string($expression->opposite)){
                $data['opposite'] = json_decode($expression->opposite);
            }
            if ($expression->story != null && is_string($expression->story)){
                $data['story'] = json_decode($expression->story);
            }
            if ($expression->spelling != null && is_string($expression->spelling)){
                $data['spelling'] = json_decode($expression->spelling);
            }

            if (count($data)){
                $expression->update($data);
                $this->info(json_encode($expression), JSON_UNESCAPED_UNICODE);
            }
        }*/

        $WorldCulturalHeritages = ChinaWorldCulturalHeritage::get();
        foreach ($WorldCulturalHeritages as $WorldCulturalHeritage) {
            $WorldCulturalHeritage->update([
                'image' => str_replace('https://p2-cdn.jingmo.ruaruan.comimages','https://p2-cdn.jingmo.ruaruan.com/images',$WorldCulturalHeritage->image),
                'content' => str_replace('https://p2-cdn.jingmo.ruaruan.comimages','https://p2-cdn.jingmo.ruaruan.com/images',$WorldCulturalHeritage->content),
            ]);
        }
    }
}
