<?php

namespace App\Filament\Resources\WorldCulturalHeritageResource\Pages;

use App\Filament\Resources\ChinaWorldCulturalHeritageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorldCulturalHeritages extends ListRecords
{
    protected static string $resource = ChinaWorldCulturalHeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
