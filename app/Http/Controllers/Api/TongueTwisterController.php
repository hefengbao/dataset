<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TongueTwister;

class TongueTwisterController extends Controller
{
    public function index()
    {
        return TongueTwister::select(['id', 'title', 'content', 'content2'])->get();
    }
}
