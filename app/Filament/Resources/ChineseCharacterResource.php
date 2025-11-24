<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChineseCharacterResource\Pages;
use App\Filament\Resources\ChineseCharacterResource\RelationManagers;
use App\Models\ChineseCharacter;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Novadaemon\FilamentPrettyJson\Form\PrettyJsonField;

class ChineseCharacterResource extends Resource
{
    protected static ?string $model = ChineseCharacter::class;
    protected static ?string $modelLabel = '汉字';
    protected static ?string $pluralModelLabel = '汉字';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('radical')->label('部首'),
                TextInput::make('stroke')->label('笔画'),
                Forms\Components\Textarea::make('explanations')->columnSpanFull(),
                //PrettyJsonField::make('explanations2')->disabled(false)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('character')->label('字')->searchable(),
                TextColumn::make('pinyin')->label('拼音'),
                TextColumn::make('radical')->label('部首'),
                TextColumn::make('stroke')->label('笔画'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListChineseCharacters::route('/'),
            'create' => Pages\CreateChineseCharacter::route('/create'),
            'edit' => Pages\EditChineseCharacter::route('/{record}/edit'),
        ];
    }
}
