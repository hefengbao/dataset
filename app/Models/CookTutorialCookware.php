<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CookTutorialCookware extends Pivot
{
    protected $table = "cook_tutorial_cookware";

    public $incrementing = true;

    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(CookTutorial::class, 'tutorial_id');
    }

    public function cookware(): BelongsTo
    {
        return $this->belongsTo(Cookware::class, 'cookware_id');
    }
}
