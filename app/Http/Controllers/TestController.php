<?php

namespace App\Http\Controllers;

use App\Guwen;
use App\Jobs\GushiwenJob;
use App\Models\Poem;
use App\Models\Writing;
use App\Writer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Saloon\XmlWrangler\XmlReader;

class TestController extends Controller
{
    //prose
    public function index(Request $request){

        //GushiwenJob::dispatch()->onConnection('redis');

        //$data = DB::table('ha')->find($request->query('id',1));
        //dd(json_decode($data->sons));

        //return view('test.index', compact(['data']));
        /*$url = "https://so.gushiwen.cn/shiwenv_14637d5597ed.aspx";

        $url1 = explode('/', $url);

        $url2 = $url1[count($url1) -1]; //shiwenv_14637d5597ed.aspx

        $id = substr(substr($url2,0,-5 ), 8);

        $rule = [
            'image' => ['#zhengwen14637d5597ed>.contson','text']
        ];
        $ql = QueryList::Query("https://so.gushiwen.cn/shiwenv_14637d5597ed.aspx",$rule)->data;
        dd($ql);*/

       /* $class = 'App\Models\Writing';
        dd(new $class);*/

        return response(Writing::find(1));
    }

    public function poem(Request $request)
    {
        /*$id = $request->query('id', 1);

        $poem = Poem::with(['tags'])->find($id);

        return view('test.poem', compact('poem'));*/

        // 替换5196 8168
        /**
         * 重复
         * 282,291
         * 395,399
         * 533,536
         */

        $poem = Poem::whereNotIn('id',[262,266,267,282,291,375,376,395,399,533,536,616,757,758,961,985,1075, 1076,1239,1250,1300,1487,1545,1619,1796,2123,4155,5196,8168,9982])->where('content', 'like', '%（%')->first();

        return view('test.poem', compact('poem'));
    }

    public function poem_store(Request $request)
    {
        $id = $request->input('id');

        $poem = Poem::find($id);

        $poem->update([
            'title' => $request->input('title'),
            'dynasty' => $request->input('dynasty'),
            'writer' => $request->input('writer'),
            'alignment' => $request->input('alignment'),
            'content' => $request->input('content'),
            'remark' => $request->input('remark'),
            'translation' => $request->input('translation'),
            'shangxi' => $request->input('shangxi'),
        ]);

        return redirect('test/poem');
    }
}
