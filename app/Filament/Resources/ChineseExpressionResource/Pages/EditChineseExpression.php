<?php

namespace App\Filament\Resources\ChineseExpressionResource\Pages;

use App\Filament\Resources\ChineseExpressionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChineseExpression extends EditRecord
{
    protected static string $resource = ChineseExpressionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
