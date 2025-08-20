<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassicalLiteraturePeople;

class PeopleController extends Controller
{
    public function index()
    {
        $people = ClassicalLiteraturePeople::select(
            'Id',
            'Name',
            'BirthYear',
            'Birthday',
            'DeathYear',
            'Deathday',
            'Dynasty',
            'Aliases',
            'Titles',
            'Hometown',
            'Details',
        )->orderBy('id')->get();

        return response()->json($people);
    }
}
