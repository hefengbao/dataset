<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChineseLyricResource\Pages;
use App\Filament\Resources\ChineseLyricResource\RelationManagers;
use App\Models\ChineseLyric;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChineseLyricResource extends Resource
{
    protected static ?string $model = ChineseLyric::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChineseLyrics::route('/'),
            'create' => Pages\CreateChineseLyric::route('/create'),
            'edit' => Pages\EditChineseLyric::route('/{record}/edit'),
        ];
    }
}
