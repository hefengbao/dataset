<?php

namespace App\Http\Controllers;

use App\Models\ChineseIdiom;

class IdiomController extends Controller
{
    public function index()
    {
        return ChineseIdiom::select(['id', 'word', 'pinyin', 'explanation', 'example', 'derivation', 'first_word', 'first_letter'])->get();
    }
}
