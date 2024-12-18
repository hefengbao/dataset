<?php

namespace App\Console\Commands;

use App\Models\ChineseWisecrack;
use App\Models\Idiom;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IdiomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:idiom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*$file = file(Storage::path('idiom.json'));

        $arr = json_decode(implode('', $file), true);

        foreach ($arr as $key => $item){

            DB::table('idioms')->insert([
                'abbreviation' => $item['abbreviation'],
                'word' => $item['word'],
                'pinyin' => $item['pinyin'],
                'explanation' => $item['explanation'],
                'example' => $item['example'],
                'derivation' => $item['derivation'],
            ]);

            $this->info($item['word']);
        }*/

        $arr = Idiom::get();

        foreach ($arr as $item){
            $firstWord = mb_substr($item->word,0,1);
            $firstLetter = substr(Str::slug($firstWord, '-','zh'), 0,1);

            $item->update([
                'first_word' => $firstWord,
                'first_letter' => $firstLetter
            ]);

            $this->info($firstWord.' => '.$firstLetter);
        }
    }
}
