<?php

namespace App\Filament\Resources\IntangibleCulturalHeritageResource\Pages;

use App\Filament\Resources\IntangibleCulturalHeritageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntangibleCulturalHeritage extends EditRecord
{
    protected static string $resource = IntangibleCulturalHeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
