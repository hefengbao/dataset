<?php

namespace App\Filament\Resources\TongueTwisterResource\Pages;

use App\Filament\Resources\TongueTwisterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTongueTwisters extends ListRecords
{
    protected static string $resource = TongueTwisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
