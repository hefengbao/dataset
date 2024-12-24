<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExpressionDictionaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expression-dictionary';

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
        $file = file(Storage::path('ci.json'));

        $arr = json_decode(implode('', $file), true);

        foreach ($arr as $key => $item) {

            DB::table('expression_dictionaries')->insert([
                'expression' => $item['ci'],
                'explanation' => $item['explanation'],
            ]);

            $this->info($item['ci']);
        }
    }
}
