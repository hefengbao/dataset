<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\PoemSentence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClassicalLiteratureSentencesApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:poem-sentences-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:poem-sentences';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'PoemSentence')->first();

        $poem_sentences = PoemSentence::select(['id', 'content', 'from', 'poem_id'])
            ->orderBy('id')
            ->get();

        Storage::put('api/诗文名句/classical_literature_sentences_v' . $dataset->version . '.json', json_encode($poem_sentences, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
