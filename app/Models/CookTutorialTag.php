<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CookTutorialTag extends Pivot
{
    public $incrementing = true;
    protected $table = "cook_tutorial_tag";
}
