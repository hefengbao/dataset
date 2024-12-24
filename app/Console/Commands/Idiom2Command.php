<?php

namespace App\Console\Commands;

use App\Models\Idiom2;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Idiom2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:idiom2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入成语 v2';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$file = file(Storage::path('idiom.json'));

        //$arr = json_decode(, true);

        $arr = File::json(Storage::path('idiom.json'), true);

        foreach ($arr as $key => $item) {
            $example = null;
            if (isset($item['example']) && is_array($item['example'])) {
                $example = $item['example'];
            }
            Idiom2::create([
                'word' => $item['word'],
                'pinyin' => $item['pinyin'],
                'abbr' => $item['abbr'],
                'explanation' => $item['explanation'] ?? null,
                'source' => $item['source'] ?? null,
                'quote' => $item['quote'] ?? null,
                'example' => $example,
                'similar' => $item['similar'] ?? null,
                'opposite' => $item['opposite'] ?? null,
                'usage' => $item['usage'] ?? null,
                'story' => $item['story'] ?? null,
                'notice' => $item['notice'] ?? null,
                'spelling' => $item['spelling'] ?? null,
            ]);

            $this->info($item['word']);
        }
    }
}
