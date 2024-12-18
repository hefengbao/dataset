<?php

namespace App\Filament\Resources\Poem2Resource\Pages;

use App\Filament\Resources\Poem2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPoem2s extends ListRecords
{
    protected static string $resource = Poem2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
