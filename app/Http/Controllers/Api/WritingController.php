<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Writing;
use Illuminate\Http\Request;

class WritingController extends Controller
{
    public function index()
    {
        return Writing::get();
    }
}
