<?php

namespace App\Http\Controllers;

use App\Models\ChineseWisecrack;

class ChineseWisecrackController extends Controller
{
    public function index()
    {
        return ChineseWisecrack::select(['id', 'riddle', 'answer', 'first_word', 'first_letter'])->get();
    }
}
