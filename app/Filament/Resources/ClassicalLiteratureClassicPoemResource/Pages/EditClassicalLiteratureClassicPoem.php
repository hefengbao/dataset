<?php

namespace App\Filament\Resources\ClassicalLiteratureClassicPoemResource\Pages;

use App\Filament\Resources\ClassicalLiteratureClassicPoemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassicalLiteratureClassicPoem extends EditRecord
{
    protected static string $resource = ClassicalLiteratureClassicPoemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
