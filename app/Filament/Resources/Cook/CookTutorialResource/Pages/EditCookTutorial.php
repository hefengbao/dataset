<?php

namespace App\Filament\Resources\Cook\CookTutorialResource\Pages;

use App\Filament\Resources\Cook\CookTutorialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCookTutorial extends EditRecord
{
    protected static string $resource = CookTutorialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
