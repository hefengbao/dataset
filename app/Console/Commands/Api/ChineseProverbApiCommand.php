<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Proverb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseProverbApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:proverb-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:proverb';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'Proverb')->first();

        $proverbs = Proverb::select('id', 'content', 'tags')
            ->orderBy('id')
            ->get();

        Storage::put('api/谚语/chinese_proverbs_v' . $dataset->version . '.json', json_encode($proverbs, JSON_UNESCAPED_UNICODE));

        return self::SUCCESS;
    }
}
