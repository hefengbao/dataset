<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Writing;

class WritingController extends Controller
{
    public function index()
    {
        return Writing::get();
    }
}
