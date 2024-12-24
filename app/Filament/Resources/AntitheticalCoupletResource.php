<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AntitheticalCoupletResource\Pages;
use App\Filament\Resources\AntitheticalCoupletResource\RelationManagers;
use App\Models\AntitheticalCouplet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AntitheticalCoupletResource extends Resource
{
    protected static ?string $model = AntitheticalCouplet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = "对联";
    protected static ?string $pluralLabel = "对联";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make("body")->label("内容")->rows(5)->columnSpanFull()->required(),
                Forms\Components\Textarea::make("description")->label("描述")->rows(5)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id"),
                Tables\Columns\TextColumn::make("body"),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderByDesc('id');
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
            'index' => Pages\ListAntitheticalCouplets::route('/'),
            'create' => Pages\CreateAntitheticalCouplet::route('/create'),
            'edit' => Pages\EditAntitheticalCouplet::route('/{record}/edit'),
        ];
    }
}
