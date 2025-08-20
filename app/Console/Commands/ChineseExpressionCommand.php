<?php

namespace App\Console\Commands;

use App\Models\ChineseExpression;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseExpressionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese-expression';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'chinese-expression';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*$file = file(Storage::disk('public')->path('file/新华字典（第12版）.csv'));
        foreach ($file as $index =>$line) {
            if ($index > 0) {
                $array = explode(",", $line);
            }
        }*/

        $expressions = ChineseExpression::all();

        foreach ($expressions as $expression) {

        }
    }
}
