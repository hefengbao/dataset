<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Filament\Resources\ChineseQuoteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuote extends CreateRecord
{
    protected static string $resource = ChineseQuoteResource::class;
}
