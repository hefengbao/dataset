<?php

namespace App\Filament\Resources\AntitheticalCoupletResource\Pages;

use App\Filament\Resources\AntitheticalCoupletResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAntitheticalCouplets extends ListRecords
{
    protected static string $resource = AntitheticalCoupletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
