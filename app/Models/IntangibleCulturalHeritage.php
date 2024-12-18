<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntangibleCulturalHeritage extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => ChineseArray::class
    ];
}
