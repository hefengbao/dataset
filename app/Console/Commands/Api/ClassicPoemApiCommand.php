<?php

namespace App\Console\Commands\Api;

use App\Models\ChineseKnowledge;
use App\Models\Poem2;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClassicPoemApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:classic-poem-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:classic-poem';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $poems = Poem2::select('id', 'dynasty', 'writer', 'writer_introduction', 'title', 'subtitle', 'preface', 'content', 'annotation', 'translation', 'creative_background', 'explain', 'comment', 'collection', 'category')
            ->orderBy('id')
            ->get();

        Storage::put('api/classic_poems.json', json_encode($poems, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
