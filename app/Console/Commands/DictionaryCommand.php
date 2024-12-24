<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DictionaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dictionary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '处理字典数据';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = file(Storage::path('5.md'));

        $arr = [];

        foreach (range('a', 'z') as $letter) {
            $arr[$letter] = [];
        }

        $child = null;
        $p1 = null;
        $word = null;
        $wordArr = [];
        $p2 = null;
        $list = [];

        foreach ($file as $line) {
            if ($line != "\n") {
                if (Str::startsWith($line, "**") && Str::endsWith($line, "**\n")) {
                    $letter = Str::substr(Str::substr($line, 2), 0, -3);

                    if (ctype_upper($letter)) {
                        $this->info('大写' . $letter);
                    } elseif (ctype_lower($letter)) {
                        $this->info('小写' . $letter);
                        if ($child && $letter != $child) {
                            //$arr[$child][$py1]
                        }
                        $child = $letter;
                    } else {
                        $py1 = $letter;
                        $this->info($letter);
                    }
                } elseif (Str::startsWith($line, "**")) {
                    $temp = Str::substr($line, 2);
                    $word = Str::substr($temp, 0, 1);
                    $temp = Str::substr($temp, 3);
                    $p2 = Str::substr($temp, 0, 1);
                    $list[] = Str::substr($temp, 1);
                } else {
                    $list[] = $line;
                }
            }
        }
    }
}
