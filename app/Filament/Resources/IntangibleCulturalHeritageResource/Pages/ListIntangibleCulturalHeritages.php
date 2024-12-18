<?php

namespace App\Filament\Resources\IntangibleCulturalHeritageResource\Pages;

use App\Filament\Resources\IntangibleCulturalHeritageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIntangibleCulturalHeritages extends ListRecords
{
    protected static string $resource = IntangibleCulturalHeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
