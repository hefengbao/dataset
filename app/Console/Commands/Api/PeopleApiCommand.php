<?php

namespace App\Console\Commands\Api;

use App\Models\People;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function Psl\Fun\when;

class PeopleApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:people-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:people';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = 1;
        $page = 1;
        //$limit = 2000;
        $limit = 10000;

        while($start){
            $people = People::select(
                'Id',
                'Name',
                'BirthYear',
                'Birthday',
                'DeathYear',
                'Deathday',
                'Dynasty',
                'Aliases',
                'Titles',
                'Hometown',
                'Details',
            )
                ->where('id', '>=',$start)
                ->orderBY('id')
                ->limit($limit)->get();

            if (count($people) < $limit){
                $start = 0;
            }else{
                $start += $limit;
            }

            Storage::put('api/people/people_'.$page.'.json', json_encode([
                'data' => $people,
                'next_page' => $start != 0 ? 'writings_'.($page + 1).'.json' : null
            ], JSON_UNESCAPED_UNICODE));

            if ($start){
                $page ++;
            }

            $this->info($page);
        }
        $this->info('结束');
    }
}
