<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassicalLiteraturePeople extends Model
{
    protected $table = 'classicalliterature_people';

    protected $guarded = [];

    protected $casts = [
        'Aliases' => ChineseArray::class,
        'Titles' => ChineseArray::class,
        'Hometown' => ChineseArray::class,
        'Details' => ChineseArray::class,
    ];
}
