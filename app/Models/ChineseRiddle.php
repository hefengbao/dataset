<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChineseRiddle extends Model
{
    protected $table = 'chinese_riddle';
    protected $fillable = ['puzzle', 'answer'];
}
