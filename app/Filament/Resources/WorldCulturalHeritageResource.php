<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorldCulturalHeritageResource\Pages;
use App\Filament\Resources\WorldCulturalHeritageResource\RelationManagers;
use App\Models\ChinaWorldCulturalHeritage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class WorldCulturalHeritageResource extends Resource
{
    protected static ?string $model = ChinaWorldCulturalHeritage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = '世界遗产名录';

    protected static ?string $pluralModelLabel = '世界遗产名录';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('名称')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('address')
                    ->label('地址')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('level')
                    ->label('级别')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('type')
                    ->label('类别')
                    ->options([
                        '文化遗产' => '文化遗产',
                        '自然遗产' => '自然遗产',
                        '自然与文化遗产' => '自然与文化遗产',
                    ])
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('year')
                    ->label('年份')
                    ->required(),
                Forms\Components\TextInput::make('year2')
                    ->label('年份2'),
                Forms\Components\TextInput::make('image')
                    ->label('封面')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content')
                    ->label('内容')
                    ->rows(5)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListWorldCulturalHeritages::route('/'),
            'create' => Pages\CreateWorldCulturalHeritage::route('/create'),
            'edit' => Pages\EditWorldCulturalHeritage::route('/{record}/edit'),
        ];
    }
}
