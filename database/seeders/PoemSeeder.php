<?php

namespace Database\Seeders;

use App\Models\ClassicalLiteratureClassicPoem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PoemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::files('guwen');

        foreach ($files as $item) {

            $content = file(Storage::path($item));

            for ($i = 0; $i < count($content); $i++) {
                $data = json_decode($content[$i], true);

                ClassicalLiteratureClassicPoem::create([
                    'title' => $data['title'],
                    'dynasty' => isset($data['dynasty']) ? $data['dynasty'] : null,
                    'writer' => isset($data['writer']) ? $data['writer'] : null,
                    'type' => isset($data['type']) ? json_encode($data['type'], JSON_UNESCAPED_UNICODE) : null,
                    'content' => isset($data['content']) ? $data['content'] : null,
                    'remark' => isset($data['remark']) ? $data['remark'] : null,
                    'translation' => isset($data['translation']) ? $data['translation'] : null,
                    'shangxi' => isset($data['shangxi']) ? $data['shangxi'] : null,
                    'audioUrl' => isset($data['audioUrl']) ? $data['audioUrl'] : null
                ]);
            }
        }
    }
}
