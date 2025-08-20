<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChineseKnowledge extends Model
{
    protected $table = 'chinese_knowledge';

    protected $fillable = ['content', 'label', 'url'];
}
