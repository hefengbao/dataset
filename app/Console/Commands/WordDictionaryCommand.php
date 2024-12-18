<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WordDictionaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:word-dictionary';

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
        $file = file(Storage::path('word.json'));

        $arr = json_decode(implode('', $file), true);
        foreach ($arr as $item){
           DB::table('word_dictionaries')->insert([
                'word' => $item['word'],
                'oldword' => $item['oldword'],
                'strokes' => $item['strokes'],
                'pinyin' => $item['pinyin'],
                'radicals' => $item['radicals'],
                'explanation' => $item['explanation'],
                'more_explanation' => $item['more'],
           ]);

           $this->info($item['word']);
        }



        /*foreach (json_decode($file[0], true) as $key => $item){
            $this->info($item['id']);
            DB::table('ha')->insert([
                'id' => $item['id'],
                'href' => $item['href'],
                'title' => $item['title'],
                'author' => $item['author'],
                'dynasty' => $item['dynasty'],
                'content' => $item['content'],
                'sons' => json_encode($item['sons'],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
                'links' => json_encode($item['links']),
            ]);
        }*/
    }
}
