<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Riddle;
use Illuminate\Support\Facades\Storage;

class RiddleController extends Controller
{
    public function index()
    {
        $riddles = Riddle::select('id', 'puzzle', 'answer')->orderBy('id')->get();

        Storage::put('riddles.json', json_encode($riddles, JSON_UNESCAPED_UNICODE));
        return response()->json($riddles);
    }
}
