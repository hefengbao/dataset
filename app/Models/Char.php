<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Char extends Model
{
    use HasFactory;

    protected $casts = [
        'pinyin' => ChineseArray::class,
        'pinyin2' => ChineseArray::class,
        'pronunciations' => ChineseArray::class,
    ];
}
