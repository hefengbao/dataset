<?php

namespace App\Filament\Resources\ChineseCharacterResource\Pages;

use App\Filament\Resources\ChineseCharacterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChineseCharacters extends ListRecords
{
    protected static string $resource = ChineseCharacterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
