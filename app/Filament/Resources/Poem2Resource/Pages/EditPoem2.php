<?php

namespace App\Filament\Resources\Poem2Resource\Pages;

use App\Filament\Resources\Poem2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPoem2 extends EditRecord
{
    protected static string $resource = Poem2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
