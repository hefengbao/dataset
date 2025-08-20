<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassicalLiteratureWriting;

class WritingController extends Controller
{
    public function index()
    {
        return ClassicalLiteratureWriting::get();
    }
}
