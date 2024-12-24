<?php

namespace App\Console\Commands;

use App\Models\Poem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PoemSentenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:poem-sentence';

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
        $file = file(Storage::path('sentence/sentence1-10000.json'));

        /*$this->info(count($file));
        $arr = json_decode(implode('', $file), true);*/

        foreach ($file as $key => $item) {
            $item = json_decode($item, true);

            $arr = explode('《', $item['from']);

            $poem = null;

            if (is_array($arr) && count($arr) == 2) {
                $poem = Poem::where('title', trim(mb_substr($arr[1], 0, -1)))->where('writer', trim($arr[0]))->first();
            }

            DB::table('poem_sentences')->insert([
                'content' => $item['name'],
                'from' => $item['from'],
                'poem_id' => $poem?->id
            ]);

            $this->info($item['from']);
        }
    }
}
