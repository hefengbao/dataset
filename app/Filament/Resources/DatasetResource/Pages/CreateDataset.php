<?php

namespace App\Filament\Resources\DatasetResource\Pages;

use App\Filament\Resources\DatasetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDataset extends CreateRecord
{
    protected static string $resource = DatasetResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $str = 'App\Models\\' . $data['model'];

        $model = new $str;

        $data['count'] = $model->count();

        return $data;
    }
}
