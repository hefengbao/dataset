<?php

namespace App\Http\Controllers;

use App\Models\ChineseCharacter;
use App\Models\ClassicalLiteratureClassicPoem;
use App\Models\ClassicalLiteratureWriting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
    //prose
    public function index(Request $request)
    {
        //$character = ChineseCharacter::find(2532);

        //$character->explanations2 = json_decode($character->explanations2);

        //$character->save();

        //return response(ClassicalLiteratureWriting::where('Clauses', 'like', '%关塞莽然平%')->get());
        $writing = ClassicalLiteratureWriting::where('Id', 111512)->first();
        //$json = Storage::json(public_path('file/writing_111512.json'), JSON_THROW_ON_ERROR);
        /*$contents = File::get(public_path('file/writing_111512.json'));
        $json = json_decode(json: $contents, associative: true);
        $writing->Clauses = $json;
        $writing->save();
        $writing->update([
            'Clauses' => $json
        ]);*/
        return response()->json($writing, options: JSON_UNESCAPED_UNICODE);

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

        $poem = ClassicalLiteratureClassicPoem::whereNotIn('id', [262, 266, 267, 282, 291, 375, 376, 395, 399, 533, 536, 616, 757, 758, 961, 985, 1075, 1076, 1239, 1250, 1300, 1487, 1545, 1619, 1796, 2123, 4155, 5196, 8168, 9982])->where('content', 'like', '%（%')->first();

        return view('test.poem', compact('poem'));
    }

    public function poem_store(Request $request)
    {
        $id = $request->input('id');

        $poem = ClassicalLiteratureClassicPoem::find($id);

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
