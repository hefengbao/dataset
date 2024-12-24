<?php

namespace App\Filament\Resources\Cook;

use App\Filament\Resources\Cook;
use App\Filament\Resources\Cook\CookTutorialResource\RelationManagers;
use App\Models\CookTutorial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CookTutorialResource extends Resource
{
    protected static ?string $model = CookTutorial::class;

    protected static ?string $navigationLabel = "教程";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cook';
    protected static ?int $navigationSort = 1;

    protected static ?string $label = "教程";
    protected static ?string $pluralLabel = "教程";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('名称')->required()->maxLength(255),
                Forms\Components\TextInput::make('bv')->label('bv 号')->required()->length(12),
                Forms\Components\Select::make('method')
                    ->label('做法')
                    ->options([
                        '烧' => '烧',
                        '炒' => '炒',
                        '爆' => '爆',
                        '焖' => '焖',
                        '炖' => '炖',
                        '蒸' => '蒸',
                        '煮' => '煮',
                        '拌' => '拌',
                        '烤' => '烤',
                        '炸' => '炸',
                        '烩' => '烩',
                        '溜' => '溜',
                        '氽' => '氽',
                        '腌' => '腌',
                        '卤' => '卤',
                        '炝' => '炝',
                        '煎' => '煎',
                        '酥' => '酥',
                        '扒' => '扒',
                        '熏' => '熏',
                        '煨' => '煨',
                        '酱' => '酱',
                        '煲' => '煲',
                        '烙' => '烙',
                        '榨' => '榨',
                        '烘焙' => '烘焙',
                        '火锅' => '火锅',
                        '砂锅' => '砂锅',
                        '拔丝' => '拔丝',
                        '生鲜' => '生鲜',
                        '调味' => '调味',
                        '冷冻' => '冷冻',
                        '其他' => '其他',
                    ])->required(),
                Forms\Components\Select::make('difficulty_level')
                    ->label('难易度')
                    ->options([
                        '入门' => '入门',
                        '简单' => '简单',
                        '难' => '难',
                        '很难' => '很难',
                    ])->required(),
                Forms\Components\Select::make('category')
                    ->label('分类')
                    ->options([
                        '主食' => '主食',
                        '菜品' => '菜品',
                        '糕点' => '糕点',
                        '零食' => '零食',
                    ])->required(),
                Forms\Components\Repeater::make('cookTutorialIngredients')
                    ->label('主要食材')
                    ->addActionLabel("添加食材")
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('ingredient_id')
                            ->label('食材')
                            ->relationship('ingredient', 'name')
                            ->searchable()
                            ->preload()
                            /*->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('名称')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('category')
                                    ->label('类别')
                                    ->options([
                                        '肉禽类' => '肉禽类',
                                        '水产品类' => '水产品类',
                                        '蔬菜类' => '蔬菜类',
                                        '果品类' => '果品类',
                                        '米面豆乳' => '米面豆乳',
                                        '调味品' => '调味品',
                                        '药食' => '药食',
                                    ])
                            ])*/
                            ->required()
                    ])
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('cookTutorialCookwares')
                    ->label('主要炊具')
                    ->addActionLabel('添加炊具')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('cookware_id')
                            ->label('炊具')
                            ->relationship('cookware', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('名称')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->required()
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bv')->label('BV 号'),
                Tables\Columns\TextColumn::make('name')->label('名称'),
                Tables\Columns\TextColumn::make('method')->label('做法'),
                Tables\Columns\TextColumn::make('difficulty_level')->label('难易度'),
                Tables\Columns\TextColumn::make('category')->label('分类'),
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
            'index' => Cook\CookTutorialResource\Pages\ListCookTutorials::route('/'),
            'create' => Cook\CookTutorialResource\Pages\CreateCookTutorial::route('/create'),
            'edit' => Cook\CookTutorialResource\Pages\EditCookTutorial::route('/{record}/edit'),
        ];
    }
}
