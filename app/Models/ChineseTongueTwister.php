<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChineseTongueTwister extends Model
{
    protected $table = 'chinese_tonguetwister';

    protected $fillable = ['title', 'content', 'content2'];
}
