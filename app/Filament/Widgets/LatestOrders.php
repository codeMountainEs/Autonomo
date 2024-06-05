<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;


class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2; //orden de aparició de widget en app


    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(10)
            ->defaultSort('created_at','desc')
            ->columns([
                Tables\Columns\TextColumn::make('description')->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ubication')->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable()
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
                    Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                    ]);
            //->actions([
              //  Action::make('View Order')
                //  ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                  //->icon('heroicon-m-eye'),
            //]);
    }
}
