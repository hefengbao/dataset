<?php

namespace App\Console\Commands\Api;

use App\Models\Char;
use App\Models\Writing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CharsApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chars-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'api:chars';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = 1;
        $page = 1;
        $limit = 3000;
        while ($start){
            $chars = Char::select([
                'id',
                'char',
                'strokes',
                'pinyin',
                'pinyin2',
                'radicals',
                'frequency',
                'structure',
                'traditional',
                'variant',
                'pronunciations',
            ])
                ->where('id', '>=',$start)
                ->orderBY('id')
                ->limit($limit)->get();

            if (count($chars) < $limit){
                $start = 0;
            }else{
                //$start += $limit;
                $start = $chars->last()->id + 1;
            }

            Storage::put('api/characters/characters_'.$page.'.json', json_encode([
                'data' => $chars,
                'next_page' => $start != 0 ? 'characters_'.($page + 1).'.json' : null
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
