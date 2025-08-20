<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChineseProverb extends Model
{
    protected $table = 'chinese_proverb';
    protected $casts = [
        'tags' => ChineseArray::class
    ];
}
