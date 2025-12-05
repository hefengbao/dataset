<?php

namespace App\Filament\Resources\ProverbResource\Pages;

use App\Filament\Resources\ChineseProverbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProverb extends EditRecord
{
    protected static string $resource = ChineseProverbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
