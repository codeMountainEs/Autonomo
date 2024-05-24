<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')->required(),

                Forms\Components\TextInput::make('ubication')->required(),

                Forms\Components\TextInput::make('price')->required()->suffix('€')
                                                        ->rule('numeric')
                                                        ->minValue(0.01)
                                                        //->disabled() // Disabled because it is calculated
                                                        ->default(0) // Default value set to 0
                                                        ->afterStateHydrated(function ($state, $set, $record) {
                                                            if ($record) {
                                                                $set('price', $record->calculateTotalPrice() / 100); // Adjust based on your currency handling
                                                            }
                    })
                                                        ->validationMessages([
                                                            'required' => 'The amount is required.',
                                                            'numeric' => 'The amount must be a number.',
                                                            'min' => 'El importe debe ser superior a cero',
                                                        ]),
                Forms\Components\Select::make('category_id')
                                                        ->relationship('category', 'name'),
                Forms\Components\Radio::make('type') ->options([
                                                            'Income' => 'Income',
                                                            'Expense' => 'Expense',
                                                     ]),
                SpatieMediaLibraryFileUpload::make('image')
                                                     ->collection('order-images')
                                                    ->multiple()
                                                    ->image(),


            ]);
    }

    public static function table(Table $table): Table

    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')->sortable()
                                                    ->searchable(),
                Tables\Columns\TextColumn::make('ubication')->sortable()
                                                    ->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable()->suffix('€')
                                                    ->money('EUR')
                                                    ->getStateUsing(function (Order $record): float {
                                                        return $record->price / 100;
                                                    })
                                                    ->alignEnd(),
                Tables\Columns\TextColumn::make('category.name')
                                                     ->label('Categoría'),
                Tables\Columns\TextColumn::make('type')
                                                    ->badge(),
                SpatieMediaLibraryImageColumn::make('image')
                                                     ->collection('images'),


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
            RelationManagers\OrderlinesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
