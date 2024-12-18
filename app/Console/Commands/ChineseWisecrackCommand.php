<?php

namespace App\Console\Commands;

use App\Models\ChineseWisecrack;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChineseWisecrackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese-wisecrack';

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
        /*$file = file(Storage::path('xiehouyu.json'));

        $arr = json_decode(implode('', $file), true);

        foreach ($arr as $key => $item){

            DB::table('chinese_wisecracks')->insert([
                'riddle' => $item['riddle'],
                'answer' => $item['answer'],
            ]);

            $this->info($item['riddle']);
        }*/

        $arr = ChineseWisecrack::get();

        foreach ($arr as $item){
            /*$firstWord = mb_substr($item->riddle,0,1);
            $firstLetter = substr(Str::slug($firstWord, '-','zh'), 0,1);*/

            $item->update([
               'riddle' => trim($item->riddle),
               'answer' => trim($item->answer)
            ]);


            $this->info($item->id);
        }
    }
}
