<?php

namespace App\Filament\Resources\AntitheticalCoupletResource\Pages;

use App\Filament\Resources\ChineseAntitheticalCoupletResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAntitheticalCouplet extends EditRecord
{
    protected static string $resource = ChineseAntitheticalCoupletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
