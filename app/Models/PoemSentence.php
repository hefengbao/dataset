<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoemSentence extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'from'];
}
