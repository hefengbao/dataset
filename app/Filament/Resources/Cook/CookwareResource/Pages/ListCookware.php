<?php

namespace App\Filament\Resources\Cook\CookwareResource\Pages;

use App\Filament\Resources\Cook\CookwareResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCookware extends ListRecords
{
    protected static string $resource = CookwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
