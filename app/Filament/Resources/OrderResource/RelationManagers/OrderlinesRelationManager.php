<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Orderlines;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderlinesRelationManager extends RelationManager
{
    protected static string $relationship = 'Orderlines';

    public function form(Form $form): Form
    {
        return $form
           ->schema([
                    Forms\Components\TextInput::make('description')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('product_id')
                        ->relationship('product', 'name'),
                    Forms\Components\TextInput::make('quantity')->required()
                                                ->rule('numeric')
                                                ->minValue(0.01)
                                                ->validationMessages([
                                                    'required' => 'The amount is required.',
                                                    'numeric' => 'The amount must be a number.',
                                                    'min' => 'La cantidad mínima debe ser 1',
                                                ]),
                    Forms\Components\TextInput::make('price')->required()
                                                ->rule('numeric')
                                                ->minValue(0.01)
                                                        ->validationMessages([
                                                            'required' => 'The amount is required.',
                                                            'numeric' => 'The amount must be a number.',
                                                            'min' => 'El importe debe ser superior a cero',
                                                        ]),
                    Forms\Components\TextInput::make('import')->required()
                                                ->rule('numeric')->minValue(0.01)
                                                ->validationMessages([
                                                    'required' => 'The amount is required.',
                                                    'numeric' => 'The amount must be a number.',
                                                    'min' => 'El importe debe ser superior a cero',
                                                ]),
                    ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('description'),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
