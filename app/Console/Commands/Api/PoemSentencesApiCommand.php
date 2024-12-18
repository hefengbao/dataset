<?php

namespace App\Console\Commands\Api;

use App\Models\PoemSentence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class PoemSentencesApiCommand extends Command
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
        $poem_sentences = PoemSentence::select(['id','content','from','poem_id'])
            ->orderBy('id')
            ->get();

        Storage::put('api/poem_sentences.json', json_encode($poem_sentences, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
