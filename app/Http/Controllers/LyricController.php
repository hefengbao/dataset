<?php

namespace App\Http\Controllers;

use App\Models\Lyric;
use App\Models\Lyric2;
use Illuminate\Http\Request;

class LyricController extends Controller
{
    public function show($id)
    {
        $lyric = Lyric2::find($id);

        return view('lyric/show', compact('lyric', 'id'));
    }

    public function store(Request $request)
    {
        Lyric::create([
            'title' => $request->input('title'),
            'writer' => $request->input('writer'),
            'singer' => $request->input('singer'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('lyrics.show', $request->input('id') + 1);
    }
}
