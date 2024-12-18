<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Http\Resources\WriterResource;
use App\Models\Tag;
use App\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::get();

        return WriterResource::collection($writers);
    }
}
