<?php

namespace App\Console\Commands;

use App\Models\Char;
use Illuminate\Console\Command;

class Char2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:char2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '处理汉字';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $chars = Char::all();

        foreach ($chars as $char) {
            $pinyin = pinyin($char->char, PINYIN_NO_TONE);
            $char->update([
                'pinyin2' => $pinyin
            ]);
            $this->info(json_encode($pinyin));
        }

        $this->info('结束');
    }
}
