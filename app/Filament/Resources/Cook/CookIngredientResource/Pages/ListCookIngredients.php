<?php

namespace App\Filament\Resources\Cook\CookIngredientResource\Pages;

use App\Filament\Resources\Cook\CookIngredientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCookIngredients extends ListRecords
{
    protected static string $resource = CookIngredientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
