<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseQuote;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseQuoteApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_quote_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:句子';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_quote')->first();

        $quotes = ChineseQuote::select('id', 'content', 'author', 'from')
            ->orderBy('id')
            ->get();

        Storage::put('api/句子/chinese_quote_v' . $dataset->version . '_1.json', json_encode([
            'total' => $quotes->count(),
            'data' => $quotes,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
