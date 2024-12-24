<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\Writing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClassicalLiteratureWritingsApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:writings-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:writings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('model', 'Writing')->first();

        $start = 1;
        $page = 1;
        while ($start) {
            /*if ($page == 1){
                $limit = 150;
            } elseif ($page <= 7){
                $limit = 50;
            }else{
                $limit = 1000;
            }*/

            if ($page <= 1) {
                $limit = 250;
            } elseif ($page <= 2) {
                $limit = 150;
            } elseif ($page <= 5) {
                $limit = 1000;
            } elseif ($page <= 8) {
                $limit = 2000;
            } else {
                $limit = 1800;
            }

            $writings = Writing::select([
                'Id',
                'GroupIndex',
                'Classes',
                'Froms',
                'Allusions',
                'Pictures',
                'Dynasty',
                'Author',
                'AuthorId',
                'AuthorDate',
                'AuthorYears',
                'AuthorPlace',
                'Type',
                'TypeDetail',
                'Rhyme',
                'FirstClauseRhyme',
                'Title',
                'SubTitle',
                'TuneId',
                'Preface',
                'Clauses',
                'Note',
                'Comments',
            ])
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)
                ->get();

            if (count($writings) < $limit) {
                $start = 0;
            } else {
                $start = $writings->last()->Id + 1;
            }

            Storage::put('api/诗文/writings/classical_literature_writings_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'data' => $writings,
                'next_page' => $start != 0 ? $page + 1 : null
            ], JSON_UNESCAPED_UNICODE));

            $writings = null;

            if ($start) {
                $page++;
            }

            $this->info($page);
        }

        $this->info('结束');

        return self::SUCCESS;
    }
}
