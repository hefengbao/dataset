<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IntangibleCulturalHeritageResource\Pages;
use App\Filament\Resources\IntangibleCulturalHeritageResource\RelationManagers;
use App\Models\IntangibleCulturalHeritage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IntangibleCulturalHeritageResource extends Resource
{
    protected static ?string $model = IntangibleCulturalHeritage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = "非遗";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\Textarea::make('description')->columnSpanFull(),
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
            'index' => Pages\ListIntangibleCulturalHeritages::route('/'),
            'create' => Pages\CreateIntangibleCulturalHeritage::route('/create'),
            'edit' => Pages\EditIntangibleCulturalHeritage::route('/{record}/edit'),
        ];
    }
}
