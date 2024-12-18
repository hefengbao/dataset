<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CookTutorialTag extends Pivot
{
    protected $table = "cook_tutorial_tag";

    public $incrementing = true;
}
