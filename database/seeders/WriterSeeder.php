<?php

namespace Database\Seeders;

use App\Writer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::files('writer');

        foreach ($files as $item) {

            $content = file(Storage::path($item));

            for ($i = 0; $i < count($content); $i++) {
                $data = json_decode($content[$i], true);
                Writer::create([
                    'name' => $data['name'],
                    'avatar' => isset($data['headImageUrl']) ? $data['headImageUrl'] : null,
                    'simple_intro' => isset($data['simpleIntro']) ? $data['simpleIntro'] : null,
                    'detail_intro' => isset($data['detailIntro']) ? $data['detailIntro'] : null
                ]);
            }

        }
    }
}
