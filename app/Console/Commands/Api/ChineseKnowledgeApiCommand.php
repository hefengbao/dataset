<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseKnowledge;
use App\Models\Dataset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseKnowledgeApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese_knowledge_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:知识卡片';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'chinese_knowledge')->first();

        $chinese_knowledge = ChineseKnowledge::select('id', 'content', 'label', 'url')
            ->orderBy('id')
            ->get();

        Storage::put('api/知识卡片/chinese_knowledge_v' . $dataset->version . '_1.json', json_encode(
            [
                'total' => count($chinese_knowledge),
                'data' => $chinese_knowledge,
                'next_page' => null
            ], JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
