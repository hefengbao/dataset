<?php

namespace App\Console\Commands\Api;

use App\Models\Writing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class WritingsApiCommand extends Command
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
        $start = 1;
        $page = 1;
        while ($start){
            /*if ($page == 1){
                $limit = 150;
            } elseif ($page <= 7){
                $limit = 50;
            }else{
                $limit = 1000;
            }*/

            if ($page <= 2){
                $limit = 300;
            }elseif ($page <= 9){
                $limit = 4000;
            } elseif ($page <= 30){
                $limit = 6000;
            }else{
                $limit = 10000;
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
                ->where('id', '>=',$start)
                ->orderBY('id')
                ->limit($limit)->get();

            if (count($writings) < $limit){
                $start = 0;
            }else{
                $start += $limit;
            }

            Storage::put('api/writings/writings_'.$page.'.json', json_encode([
                'data' => $writings,
                'next_page' => $start != 0 ? 'writings_'.($page + 1).'.json' : null
            ], JSON_UNESCAPED_UNICODE));

            if ($start){
                $page ++;
            }

            $this->info($page);
        }

        $this->info('结束');

        return self::SUCCESS;
    }
}
