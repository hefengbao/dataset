<?php

namespace App\Console\Commands\Api;

use App\Models\Dataset;
use App\Models\ClassicalLiteraturePeople;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClassicalLiteraturePeopleApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:classicalliterature_people_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api:人物';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataset = Dataset::where('name', 'classicalliterature_people')->first();

        $start = 1;
        $page = 1;
        $limit = 10000;

        $total = ClassicalLiteraturePeople::count();

        while ($start) {
            $people = ClassicalLiteraturePeople::select(
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
                ->where('id', '>=', $start)
                ->orderBY('id')
                ->limit($limit)->get();

            if (count($people) < $limit) {
                $start = 0;
            } else {
                $start += $limit;
            }

            Storage::put('api/人物/classicalliterature_people_v' . $dataset->version . '_' . $page . '.json', json_encode([
                'total' => $total,
                'data' => $people,
                'next_page' => $start != 0 ? $page + 1 : null
            ], JSON_UNESCAPED_UNICODE));

            if ($start) {
                $page++;
            }

            $this->info($page);
        }
        $this->info('结束');
    }
}
