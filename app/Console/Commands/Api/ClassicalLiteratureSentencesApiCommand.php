<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ClassicalLiteratureSentence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClassicalLiteratureSentencesApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:classicalliterature_sentence_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:诗文名句';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'classicalliterature_sentence')->first();

        $poem_sentences = ClassicalLiteratureSentence::select(['id', 'content', 'from', 'poem_id'])
            ->orderBy('id')
            ->get();

        Storage::put('api/诗文名句/classicalliterature_sentence_v' . $dataset->version . '_1.json', json_encode([
            'total' => $poem_sentences->count(),
            'data' => $poem_sentences,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
