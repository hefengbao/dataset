<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ChineseProverb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseProverbApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_proverb_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:谚语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_proverb')->first();

        $proverbs = ChineseProverb::select('id', 'content', 'tags')
            ->orderBy('id')
            ->get();

        Storage::put('api/谚语/chinese_proverb_v' . $dataset->version . '_1.json', json_encode([
            'total' => count($proverbs),
            'data' => $proverbs,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
