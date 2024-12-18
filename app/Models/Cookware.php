<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 炊具
 */
class Cookware extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
