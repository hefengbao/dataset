<?php

namespace App\Filament\Resources\ClassicalLiteratureClassicPoemResource\Pages;

use App\Filament\Resources\ClassicalLiteratureClassicPoemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClassicalLiteratureClassicPoems extends ListRecords
{
    protected static string $resource = ClassicalLiteratureClassicPoemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
