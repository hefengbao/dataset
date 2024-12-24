<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoemResource;
use App\Models\Poem;
use Illuminate\Support\Facades\DB;

class PoemController extends Controller
{
    public function index()
    {
        $poems = Poem::get();

        return PoemResource::collection($poems);
    }

    public function tags()
    {
        return DB::table('poem_tag')->select(['poem_id', 'tag_id'])->get();
    }
}
