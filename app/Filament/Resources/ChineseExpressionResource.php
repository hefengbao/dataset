<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChineseExpressionResource\Pages;
use App\Filament\Resources\ChineseExpressionResource\RelationManagers;
use App\Models\ChineseExpression;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChineseExpressionResource extends Resource
{
    protected static ?string $model = ChineseExpression::class;
    protected static ?string $modelLabel = '词语';
    protected static ?string $pluralModelLabel = '词语';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('word')
                    ->label('词语'),
                TextInput::make('pinyin')
                    ->label('拼音'),
                Forms\Components\Textarea::make('explanation')
                    ->label('释义')
                    ->columnSpanFull(),
                /*Forms\Components\Textarea::make('example[]')
                    ->label('示例')
                    ->columnSpanFull(),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('word')
                    ->label('词语')
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChineseExpressions::route('/'),
            'create' => Pages\CreateChineseExpression::route('/create'),
            'edit' => Pages\EditChineseExpression::route('/{record}/edit'),
        ];
    }
}
