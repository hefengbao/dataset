<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $guarded = [];

    protected $casts = [
        'detail_intro' => 'array'
    ];
}
