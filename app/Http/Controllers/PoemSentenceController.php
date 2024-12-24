<?php

namespace App\Http\Controllers;

use App\Models\PoemSentence;
use Illuminate\Http\Request;

class PoemSentenceController extends Controller
{
    public function index(Request $request)
    {
        //return PoemSentence::select(['id','content','from','poem_id'])->get();
        $sentence = PoemSentence::find($request->query('id', 1));

        return view('poem_sentence.index', ['sentence' => $sentence]);
    }

    public function store($id, Request $request)
    {
        $sentence = PoemSentence::find($id);

        $sentence->update($request->except('_token', '_method'));

        return redirect('/poem_sentence?id=' . $id + 1);
    }
}
