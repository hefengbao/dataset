<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseKnowledge;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ChineseKnowledgeApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chinese-knowledge-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:chinese-knowledge';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $chinese_knowledge = ChineseKnowledge::select('id', 'content', 'label', 'url')
            ->orderBy('id')
            ->get();

        Storage::put('api/chinese_knowledge.json', json_encode($chinese_knowledge, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
