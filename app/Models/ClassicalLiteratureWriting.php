<?php

namespace App\Models;

use App\Casts\ChineseArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassicalLiteratureWriting extends Model
{
    protected $table = 'classicalliterature_writing';

    protected $guarded = [];

    protected $casts = [
        'Classes' => ChineseArray::class,
        'Froms' => ChineseArray::class,
        'Allusions' => ChineseArray::class,
        'Pictures' => ChineseArray::class,
        'TypeDetail' => ChineseArray::class,
        'Title' => ChineseArray::class,
        'SubTitle' => ChineseArray::class,
        'TuneId' => ChineseArray::class,
        'Clauses' => ChineseArray::class,
        'Note' => ChineseArray::class,
        'Comments' => ChineseArray::class,
    ];

    public function links(): HasMany
    {
        return $this->hasMany(WritingLink::class, 'ResourceId', 'Id');
    }
}
