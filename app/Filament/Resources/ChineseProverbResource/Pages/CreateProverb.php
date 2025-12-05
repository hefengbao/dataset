<?php

namespace App\Filament\Resources\ProverbResource\Pages;

use App\Filament\Resources\ChineseProverbResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProverb extends CreateRecord
{
    protected static string $resource = ChineseProverbResource::class;
}
