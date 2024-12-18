<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CookTutorialIngredient extends Pivot
{
    protected $table = "cook_tutorial_ingredient";

    public $incrementing = true;

    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(CookTutorial::class, 'tutorial_id');
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(CookIngredient::class, 'ingredient_id');
    }
}
