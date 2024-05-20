<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderlinesResource\Pages;
use App\Filament\Resources\OrderlinesResource\RelationManagers;
use App\Models\Orderlines;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderlinesResource extends Resource
{
    protected static ?string $model = Orderlines::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('order_id')
                                            ->relationship('order', 'name'),
                Forms\Components\Select::make('product_id')
                                            ->relationship('product', 'name'),
                Forms\Components\TextInput::make('description')->required(),
                Forms\Components\TextInput::make('quantity')->required()
                                                         ->rule('numeric'),
                Forms\Components\TextInput::make('price')->required()
                                                         ->rule('numeric'),
                Forms\Components\TextInput::make('import')->required()->rule('numeric'),


            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.name')
                                                     ->label('order'),
                Tables\Columns\TextColumn::make('product.name')
                                                     ->label('product'),
                Tables\Columns\TextColumn::make('description')->sortable()
                                                     ->searchable(),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('price')->sortable()
                                                    ->money('EUR')
                                                    ->getStateUsing(function (Orderlines $record): float {
                                                        return $record->price / 100;
                                                    }),
                Tables\Columns\TextColumn::make('import')->sortable()
                                                    ->money('EUR')
                                                    ->getStateUsing(function (Orderlines $record): float {
                                                        return $record->price / 100;
                }),
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
            'index' => Pages\ListOrderlines::route('/'),
            'create' => Pages\CreateOrderlines::route('/create'),
            'edit' => Pages\EditOrderlines::route('/{record}/edit'),
        ];
    }
}
