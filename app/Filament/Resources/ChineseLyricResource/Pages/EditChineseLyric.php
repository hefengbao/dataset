<?php

namespace App\Filament\Resources\ChineseLyricResource\Pages;

use App\Filament\Resources\ChineseLyricResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChineseLyric extends EditRecord
{
    protected static string $resource = ChineseLyricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
