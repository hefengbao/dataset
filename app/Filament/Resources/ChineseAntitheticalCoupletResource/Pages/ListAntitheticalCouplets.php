<?php

namespace App\Filament\Resources\AntitheticalCoupletResource\Pages;

use App\Filament\Resources\ChineseAntitheticalCoupletResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAntitheticalCouplets extends ListRecords
{
    protected static string $resource = ChineseAntitheticalCoupletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
