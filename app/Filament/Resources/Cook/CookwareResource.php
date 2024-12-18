<?php

namespace App\Filament\Resources\Cook;

use App\Filament\Resources\Cook;
use App\Filament\Resources\Cook\CookwareResource\Pages;
use App\Filament\Resources\Cook\CookwareResource\RelationManagers;
use App\Models\Cookware;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CookwareResource extends Resource
{
    protected static ?string $model = Cookware::class;

    protected static ?string $navigationLabel = "炊具";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cook';
    protected static ?int $navigationSort = 3;

    protected static ?string $label = "炊具";
    protected static ?string $pluralLabel = "炊具";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Cook\CookwareResource\Pages\ListCookware::route('/'),
            'create' => Cook\CookwareResource\Pages\CreateCookware::route('/create'),
            'edit' => Cook\CookwareResource\Pages\EditCookware::route('/{record}/edit'),
        ];
    }
}
