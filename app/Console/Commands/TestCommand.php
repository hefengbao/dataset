<?php

namespace App\Console\Commands;

use App\Guwen;
use App\Models\CookIngredient;
use App\Models\Poem;
use App\Models\Tag;
use App\Writer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Monolog\Handler\IFTTTHandler;
use DiDom\Document;
use QL\QueryList;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        /*$file = file(Storage::path('gushiwen.json'));

        foreach (json_decode($file[0], true) as $key => $item){
            $this->info($item['id']);
            DB::table('ha')->insert([
                'id' => $item['id'],
                'href' => $item['href'],
                'title' => $item['title'],
                'author' => $item['author'],
                'dynasty' => $item['dynasty'],
                'content' => $item['content'],
                'sons' => json_encode($item['sons'],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
                'links' => json_encode($item['links']),
            ]);
        }*/

        /*$poems = Poem::get();
        foreach ($poems as $poem){

            $writer = Writer::where('name', $poem->writer)->first();

            if (!$writer){
                if ($poem->writer){
                    $writer = Writer::create([
                        'name' => $poem->writer,
                        'dynasty' => $poem->dynasty,
                    ]);
                }
            }else{
                $detail = json_decode($writer->detail_intro, true);
                $detailArr = [];
                if ($detail && count($detail)){
                    foreach ($detail as $key => $item){
                        $detailArr[] = [
                            'title' => $key,
                            'content' => $item
                        ];
                    }
                }

                $writer->update([
                    'dynasty' => $poem->dynasty,
                    'avatar2' => $writer->avatar ? substr($writer->avatar, 63) : null,
                    'detail_intro2' => json_encode($detailArr, JSON_UNESCAPED_UNICODE)
                ]);
            }

            $poem->update([
                'writer_id' => $writer->id,
                'audioUrl2' => $poem->audioUrl ? substr($poem->audioUrl,59) : null,
            ]);

            $temp = json_decode($poem->type);
            $tags = [];
            if ($temp && count($temp)){
                foreach ($temp as $title){
                    if ($title != ''){
                        $tag = Tag::firstOrCreate([
                            'title' => $title
                        ]);

                        $tags[] = $tag->id;
                    }
                }
            }

            if (count($tags)){
                $poem->tags()->attach($tags);
            }

            $this->info($poem->id);
        }*/

        /*$arr = explode('《','佚名《越人歌》');
        $this->info($arr[0].' => '. mb_substr($arr[1],0,-1));*/

        /*$poems = Poem::whereNotNull('audioUrl2')->get();
        foreach ($poems as $poem){
            $arr = explode('/', $poem->title);
            $title = trim($arr[0]);
            if (isset($arr[1])){
                $title .= "（".trim($arr[1])."）";
            }
            $name = $poem->writer.'-'.$title.'.mp3';
            $this->info(Storage::path('audios/'.$poem->audioUrl2));
            if (Storage::exists('audios/'.$poem->audioUrl2)){
                Storage::put('audios2/'.$name, Storage::get('audios/'.$poem->audioUrl2), 'public');
                $this->info($name);
            }
        }*/

        /*$document = new Document('https://www.foodwake.com/category/food-class/9', true);

        $list = $document->find('.list-unstyled');

        //$this->info($list[0]);

        //$list = $list[0]->find('.main-list-li');

        foreach ($list[0] as $item)
        {
            $this->info($item->text());
        }*/

        $ql = QueryList::get('https://www.foodwake.com/category/food-class/17');

        //$ql = $ql->find('.list-unstyled');

        $data = $ql->rules([
            'link' => ['a','href'],
            'data' => ['a', 'text']
        ])->range('.list-unstyled li')->query()->getData();

        //$this->info(json_encode($data->all(),JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE));

        foreach ($data->all() as $key => $item) {
            if (str_contains($item['link'],'https://www.foodwake.com/food/')){
                //$this->info(substr($item['link'],30). '=>' . $item['data']);

                $this->info($key .'=>'. $item['data']);
                if ($key <= 5){
                    $category2 = '酱油';
                }elseif ($key <= 12){
                    $category2 = '醋';
                }elseif ($key <= 51){
                    $category2 = '酱';
                }elseif ($key <= 57){
                    $category2 = '腐乳';
                }elseif ($key <= 78){
                    $category2 = '咸菜类';
                }elseif ($key <= 121){
                    $category2 = '香辛料';
                }else{
                    $category2 = '盐、味精及其他';
                }

                CookIngredient::create([
                    'id' => substr($item['link'],30),
                    'name' => $item['data'],
                    'category' => '调味品类',
                    'category2' => $category2,
                ]);
            }
        }

        $this->info('完成','success');
    }
}
