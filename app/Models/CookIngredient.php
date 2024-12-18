<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 食材
 */
class CookIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','other_names','category','category2','image','calorie'];
}
