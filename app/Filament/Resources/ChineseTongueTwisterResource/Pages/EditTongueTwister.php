<?php

namespace App\Filament\Resources\TongueTwisterResource\Pages;

use App\Filament\Resources\ChineseTongueTwisterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTongueTwister extends EditRecord
{
    protected static string $resource = ChineseTongueTwisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
