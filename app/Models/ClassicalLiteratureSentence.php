<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassicalLiteratureSentence extends Model
{
    protected $table = 'classicalliterature_sentence';

    protected $fillable = ['content', 'from'];
}
