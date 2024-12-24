<?php

namespace App\Http\Controllers;

use App\Http\Resources\WriterResource;
use App\Writer;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::get();

        return WriterResource::collection($writers);
    }
}
