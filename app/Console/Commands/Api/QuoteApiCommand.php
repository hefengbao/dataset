<?php

namespace App\Console\Commands\Api;

use App\Models\Proverb;
use App\Models\Quote;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class QuoteApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:quote-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:quote';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $quotes = Quote::select('id', 'content', 'author', 'from')
            ->orderBy('id')
            ->get();

        Storage::put('api/chinese_quotes.json', json_encode($quotes, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
