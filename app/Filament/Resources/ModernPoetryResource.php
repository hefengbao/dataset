<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModernPoetryResource\Pages;
use App\Filament\Resources\ModernPoetryResource\RelationManagers;
use App\Models\ModernPoetry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModernPoetryResource extends Resource
{
    protected static ?string $model = ModernPoetry::class;
    protected static ?string $modelLabel = '现代诗歌';
    protected static ?string $pluralModelLabel = '现代诗歌';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('标题')->required()->columnSpanFull(),
                Forms\Components\TextInput::make('author')->label('作者')->required()->columnSpanFull(),
                Forms\Components\Textarea::make('content')->label('内容')->required()->columnSpanFull()->rows(10),
                Forms\Components\Textarea::make('zhu')->label('注释')->columnSpanFull(),
                Forms\Components\Textarea::make('yi')->label('译文')->columnSpanFull(),
                Forms\Components\Textarea::make('shang')->label('赏析')->columnSpanFull(),
                Forms\Components\Textarea::make('author_info')->label('作者介绍')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('author')->searchable(),
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
        return parent::getEloquentQuery()->orderByDesc('id'); // TODO: Change the autogenerated stub
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
            'index' => Pages\ListModernPoetries::route('/'),
            'create' => Pages\CreateModernPoetry::route('/create'),
            'edit' => Pages\EditModernPoetry::route('/{record}/edit'),
        ];
    }
}