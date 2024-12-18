<?php

namespace App\Filament\Resources\ChineseKnowledgeResource\Pages;

use App\Filament\Resources\ChineseKnowledgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChineseKnowledge extends ListRecords
{
    protected static string $resource = ChineseKnowledgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
