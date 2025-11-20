<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseRiddle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseRiddlesApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_riddle_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:谜语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_riddle')->first();

        $riddles = ChineseRiddle::select('id', 'puzzle', 'answer')
            ->orderBy('id')
            ->get();

        Storage::put('api/谜语/chinese_riddle_v' . $dataset->version . '_1.json', json_encode([
            'total' => $riddles->count(),
            'data' => $riddles,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
