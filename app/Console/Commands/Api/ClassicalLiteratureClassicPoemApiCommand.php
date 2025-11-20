<?php

namespace App\Console\Commands\Api;

use App\Models\ClassicalLiteratureClassicPoem;
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
    protected $signature = 'app:classicalliterature_classicpoem_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:经典诗文';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'classicalliterature_classicpoem')->first();

        $poems = ClassicalLiteratureClassicPoem::select('id', 'dynasty', 'writer', 'writer_introduction', 'title', 'subtitle', 'preface', 'content', 'annotation', 'translation', 'creative_background', 'explain', 'comment', 'collection', 'category')
            ->orderBy('id')
            ->get();

        Storage::put('api/经典诗文/classicalliterature_classicpoem_v' . $dataset->version . '_1.json', json_encode([
            'total' => count($poems),
            'data' => $poems,
            'next_page' => null
        ], JSON_UNESCAPED_UNICODE));

        $this->info('结束');
    }
}
