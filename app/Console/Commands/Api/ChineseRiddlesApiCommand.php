<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Riddle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseRiddlesApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riddles-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:ridles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'Riddle')->first();

        $riddles = Riddle::select('id', 'puzzle', 'answer')
            ->orderBy('id')
            ->get();

        Storage::put('api/谜语/chinese_riddles_v' . $dataset->version . '.json', json_encode($riddles, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
