<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Model;

class ChineseCharacter extends Model
{
    protected $table = 'chinese_character';
    protected $guarded = [];
    protected function casts()
    {
        return [
            'explanations' => ChineseArray::class,
            'explanations2' => ChineseArray::class,
            //'stoke' => 'int'
        ];
    }
}
