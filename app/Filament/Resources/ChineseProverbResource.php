<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProverbResource\Pages;
use App\Filament\Resources\ProverbResource\RelationManagers;
use App\Models\ChineseProverb;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChineseProverbResource extends Resource
{
    protected static ?string $model = ChineseProverb::class;
    protected static ?string $modelLabel = '谚语';
    protected static ?string $pluralModelLabel = '谚语';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content')->label('内容')->columnSpanFull(),
                Forms\Components\TagsInput::make('tags')->label('标签')->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('tags'),
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
            'index' => Pages\ListProverbs::route('/'),
            'create' => Pages\CreateProverb::route('/create'),
            'edit' => Pages\EditProverb::route('/{record}/edit'),
        ];
    }
}
