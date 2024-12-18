<?php

namespace App\Filament\Resources\WorldCulturalHeritageResource\Pages;

use App\Filament\Resources\WorldCulturalHeritageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorldCulturalHeritage extends EditRecord
{
    protected static string $resource = WorldCulturalHeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
