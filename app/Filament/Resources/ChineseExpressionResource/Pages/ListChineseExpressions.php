<?php

namespace App\Filament\Resources\ChineseExpressionResource\Pages;

use App\Filament\Resources\ChineseExpressionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChineseExpressions extends ListRecords
{
    protected static string $resource = ChineseExpressionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
