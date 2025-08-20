<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChineseTongueTwister;

class TongueTwisterController extends Controller
{
    public function index()
    {
        return ChineseTongueTwister::select(['id', 'title', 'content', 'content2'])->get();
    }
}
