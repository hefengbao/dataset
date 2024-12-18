<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idiom2 extends Model
{
    use HasFactory;

    protected $casts = [
        'source' => ChineseArray::class,
        'quote' => ChineseArray::class,
        'example' => ChineseArray::class,
        'similar' => ChineseArray::class,
        'opposite' => ChineseArray::class,
        'story' => ChineseArray::class,
        'spelling' => ChineseArray::class,
    ];
}
