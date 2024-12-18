<?php

namespace App\Filament\Resources\Cook\CookIngredientResource\Pages;

use App\Filament\Resources\Cook\CookIngredientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCookIngredient extends EditRecord
{
    protected static string $resource = CookIngredientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
