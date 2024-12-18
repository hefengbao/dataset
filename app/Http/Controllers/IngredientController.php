<?php

namespace App\Http\Controllers;

use App\Models\CookIngredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $data = CookIngredient::get();

        $ingredients = $data->groupBy('category');

        return view('cook.ingredient.index', compact('ingredients'));
    }
}
