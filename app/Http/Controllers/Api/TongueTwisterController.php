<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TongueTwister;
use Illuminate\Http\Request;

class TongueTwisterController extends Controller
{
    public function index(){
        return TongueTwister::select(['id','title','content','content2'])->get();
    }
}
