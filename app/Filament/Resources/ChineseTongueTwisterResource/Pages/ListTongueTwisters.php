<?php

namespace App\Filament\Resources\TongueTwisterResource\Pages;

use App\Filament\Resources\ChineseTongueTwisterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTongueTwisters extends ListRecords
{
    protected static string $resource = ChineseTongueTwisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
