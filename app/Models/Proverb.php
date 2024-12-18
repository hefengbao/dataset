<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proverb extends Model
{
    use HasFactory;

    protected $casts = [
        'tags' => ChineseArray::class
    ];
}
