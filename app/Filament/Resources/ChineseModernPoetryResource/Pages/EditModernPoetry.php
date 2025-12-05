<?php

namespace App\Filament\Resources\ModernPoetryResource\Pages;

use App\Filament\Resources\ChineseModernPoetryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModernPoetry extends EditRecord
{
    protected static string $resource = ChineseModernPoetryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
