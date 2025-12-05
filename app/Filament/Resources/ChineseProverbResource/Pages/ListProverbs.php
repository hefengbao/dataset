<?php

namespace App\Filament\Resources\ProverbResource\Pages;

use App\Filament\Resources\ChineseProverbResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProverbs extends ListRecords
{
    protected static string $resource = ChineseProverbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
