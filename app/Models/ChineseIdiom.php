<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Model;

class ChineseIdiom extends Model
{
    protected $table = 'chinese_idiom';
    protected function casts()
    {
        return [
            'source' => ChineseArray::class,
            'quote' => ChineseArray::class,
            'example' => ChineseArray::class,
            'similar' => ChineseArray::class,
            'opposite' => ChineseArray::class,
            'story' => ChineseArray::class,
            'spelling' => ChineseArray::class,
        ];
    }
}
