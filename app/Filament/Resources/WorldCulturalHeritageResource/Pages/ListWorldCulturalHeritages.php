<?php

namespace App\Filament\Resources\WorldCulturalHeritageResource\Pages;

use App\Filament\Resources\WorldCulturalHeritageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorldCulturalHeritages extends ListRecords
{
    protected static string $resource = WorldCulturalHeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
