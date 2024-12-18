<?php

namespace App\Filament\Resources\ChineseKnowledgeResource\Pages;

use App\Filament\Resources\ChineseKnowledgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChineseKnowledge extends EditRecord
{
    protected static string $resource = ChineseKnowledgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
