<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Poem2Resource\Pages;
use App\Filament\Resources\Poem2Resource\RelationManagers;
use App\Models\Poem2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class Poem2Resource extends Resource
{
    protected static ?string $model = Poem2::class;
    protected static ?string $modelLabel = '经典诗文';
    protected static ?string $pluralModelLabel = '经典诗文';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('dynasty')
                    ->name('朝代')
                    ->default('宋')
                    ->required(),
                Forms\Components\TextInput::make('writer')
                    ->name('作者')
                    ->required(),
                Forms\Components\Textarea::make('writer_introduction')
                    ->name('作者简介')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->name('标题')
                    ->required(),
                Forms\Components\TextInput::make('subtitle')
                    ->name('副标题'),
                Forms\Components\Textarea::make('preface')
                    ->name('诗序')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content')
                    ->name('内容')
                    ->rows(6)
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Textarea::make('annotation')
                    ->name('注释')
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('translation')
                    ->name('译文')
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('creative_background')
                    ->name('创作背景')
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('explain')
                    ->name('解读')
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('comment')
                    ->name('诗评')
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('collection')
                    ->name('合集')
                    ->default('宋词三百首'),
                /*Forms\Components\TextInput::make('category')
                    ->name('分类')
                    ->default(),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('title')
                    ->label('标题')
                    ->description(fn(Poem2 $record): string => $record->subtitle ?: ''),
                Tables\Columns\TextColumn::make('writer')
                    ->label('作者'),
                Tables\Columns\TextColumn::make('dynasty')
                    ->label('朝代'),
                Tables\Columns\TextColumn::make('collection')
                    ->label('合集')
                    ->description(fn(Poem2 $record): string => $record->category ?: ''),
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
            'index' => Pages\ListPoem2s::route('/'),
            'create' => Pages\CreatePoem2::route('/create'),
            'edit' => Pages\EditPoem2::route('/{record}/edit'),
        ];
    }
}
