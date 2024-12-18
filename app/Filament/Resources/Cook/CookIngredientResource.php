<?php

namespace App\Filament\Resources\Cook;

use App\Filament\Resources\Cook;
use App\Filament\Resources\Cook\CookIngredientResource\Pages;
use App\Filament\Resources\Cook\CookIngredientResource\RelationManagers;
use App\Models\CookIngredient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CookIngredientResource extends Resource
{
    protected static ?string $model = CookIngredient::class;

    protected static ?string $navigationLabel = "食材";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cook';
    protected static ?int $navigationSort = 2;

    protected static ?string $label = "食材";
    protected static ?string $pluralLabel = "食材";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('other_names')
                    ->maxLength(255),
                Forms\Components\Select::make('category')
                    ->label('类别')
                    ->options([
                        '谷类' => '谷类',
                        '薯类' => '薯类',
                        '豆类' => '豆类',
                        '蔬菜' => '蔬菜',
                        '蛋类' => '蛋类',
                        '乳类' => '乳类',
                        '畜肉' => '畜肉',
                        '禽肉' => '禽肉',
                        '河海鲜' => '河海鲜',
                        '菌类' => '菌类',
                        '藻类' => '藻类',
                        '水果' => '水果',
                        '坚果' => '坚果',
                        '茶类' => '茶类',
                        '酒类' => '酒类',
                        '油类' => '油类',
                        '调味品类' => '调味品类',
                        '零食饮料' => '零食饮料',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('category2')
                    ->label('小类')
                    ->required(),
                Forms\Components\TextInput::make('calorie')
                    ->label('热量/100g')
                    ->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->directory('cook/ingredient')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('desc')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('名称'),
                Tables\Columns\TextColumn::make('other_names')->label('别名'),
                Tables\Columns\TextColumn::make('category')->label('大类'),
                Tables\Columns\TextColumn::make('category2')->label('小类'),
                Tables\Columns\TextColumn::make('calorie')->label('热量/100g'),
                Tables\Columns\ImageColumn::make('image')->label('图片'),
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
            'index' => Cook\CookIngredientResource\Pages\ListCookIngredients::route('/'),
            'create' => Cook\CookIngredientResource\Pages\CreateCookIngredient::route('/create'),
            'edit' => Cook\CookIngredientResource\Pages\EditCookIngredient::route('/{record}/edit'),
        ];
    }
}
