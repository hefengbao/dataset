<?php

namespace App\Filament\Resources\ModernPoetryResource\Pages;

use App\Filament\Resources\ModernPoetryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModernPoetries extends ListRecords
{
    protected static string $resource = ModernPoetryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
