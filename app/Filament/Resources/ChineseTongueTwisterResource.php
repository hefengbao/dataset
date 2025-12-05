<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TongueTwisterResource\Pages;
use App\Filament\Resources\TongueTwisterResource\RelationManagers;
use App\Models\ChineseTongueTwister;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ChineseTongueTwisterResource extends Resource
{
    protected static ?string $model = ChineseTongueTwister::class;
    protected static ?string $modelLabel = '绕口令';
    protected static ?string $pluralModelLabel = '绕口令';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->name('标题')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content')
                    ->name('内容')
                    ->required()
                    ->rows(8)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content2')
                    ->name('内容2')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('标题')
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
            'index' => Pages\ListTongueTwisters::route('/'),
            'create' => Pages\CreateTongueTwister::route('/create'),
            'edit' => Pages\EditTongueTwister::route('/{record}/edit'),
        ];
    }
}
