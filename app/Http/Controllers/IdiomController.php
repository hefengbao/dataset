<?php

namespace App\Http\Controllers;

use App\Models\Idiom;

class IdiomController extends Controller
{
    public function index()
    {
        return Idiom::select(['id', 'word', 'pinyin', 'explanation', 'example', 'derivation', 'first_word', 'first_letter'])->get();
    }
}
