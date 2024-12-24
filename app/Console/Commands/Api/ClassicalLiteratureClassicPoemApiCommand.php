<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Poem2;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClassicalLiteratureClassicPoemApiCommand extends Command
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
        $dataset = Dataset::where('model', 'Poem2')->first();

        $poems = Poem2::select('id', 'dynasty', 'writer', 'writer_introduction', 'title', 'subtitle', 'preface', 'content', 'annotation', 'translation', 'creative_background', 'explain', 'comment', 'collection', 'category')
            ->orderBy('id')
            ->get();

        Storage::put('api/经典诗文/classical_literature_classic_poems_v' . $dataset->version . '.json', json_encode($poems, JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
