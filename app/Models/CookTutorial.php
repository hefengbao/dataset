<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Cook Tutorial
 */
class CookTutorial extends Model
{
    use HasFactory;

    public function ingredients(): BelongsToMany
    {
        return $this->BelongsToMany(
            related: CookIngredient::class,
            table: 'cook_tutorial_ingredient',
            foreignPivotKey: 'tutorial_id',
            relatedPivotKey: 'ingredient_id',
        );
    }

    public function cookTutorialIngredients(): HasMany
    {
        return $this->hasMany(CookTutorialIngredient::class, 'tutorial_id');
    }

    public function cookwares(): BelongsToMany
    {
        return $this->BelongsToMany(
            related: Cookware::class,
            table: 'cook_tutorial_cookware',
            foreignPivotKey: 'tutorial_id',
            relatedPivotKey: 'cookware_id',
        );
    }

    public function cookTutorialCookwares(): HasMany
    {
        return $this->hasMany(CookTutorialCookware::class, 'tutorial_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->BelongsToMany(
            related: CookTag::class,
            table: 'cook_tutorial_tag',
            foreignPivotKey: 'tutorial_id',
            relatedPivotKey: 'tag_id',
        );
    }
}
