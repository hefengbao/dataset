<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChineseKnowledge;

class ChineseKnowledgeController extends Controller
{
    public function index()
    {
        return ChineseKnowledge::get();
    }
}
