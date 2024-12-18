<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChineseKnowledgeResource\Pages;
use App\Filament\Resources\ChineseKnowledgeResource\RelationManagers;
use App\Models\ChineseKnowledge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChineseKnowledgeResource extends Resource
{
    protected static ?string $model = ChineseKnowledge::class;
    protected static ?string $modelLabel = '语文知识';
    protected static ?string $pluralModelLabel = '语文知识';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content')
                    ->label('内容')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Forms\Components\Select::make('label')->label('标签')->options([
                    '古籍注释分类' => '古籍注释分类',
                    '典故' => '典故',
                    '文学常识' => '文学常识',
                    '易混淆字词' => '易混淆字词',
                    '其他' => '其他',
                    '诗人雅号' => '诗人雅号',
                    '十圣' => '十圣',
                    '官职变动' => '官职变动',
                ])
                    ->columns()
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('label'),
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
            'index' => Pages\ListChineseKnowledge::route('/'),
            'create' => Pages\CreateChineseKnowledge::route('/create'),
            'edit' => Pages\EditChineseKnowledge::route('/{record}/edit'),
        ];
    }
}
