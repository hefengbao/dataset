<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    use HasFactory;

    protected $casts = [
        'Keys' => ChineseArray::class,
        'RelatedPersons' => ChineseArray::class,
        'Correlations' => ChineseArray::class,
        'References' => ChineseArray::class,
        'Quotes' => ChineseArray::class,
        'Explains' => ChineseArray::class,
    ];
}
