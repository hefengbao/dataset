<?php

namespace App\Filament\Resources\Cook\CookTutorialResource\Pages;

use App\Filament\Resources\Cook\CookTutorialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCookTutorials extends ListRecords
{
    protected static string $resource = CookTutorialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
