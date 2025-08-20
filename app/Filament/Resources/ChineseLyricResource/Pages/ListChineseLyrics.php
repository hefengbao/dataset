<?php

namespace App\Filament\Resources\ChineseLyricResource\Pages;

use App\Filament\Resources\ChineseLyricResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChineseLyrics extends ListRecords
{
    protected static string $resource = ChineseLyricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
