<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
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
                Section::make('Create Order')
                ->schema([
                Forms\Components\TextInput::make('description')->required(),

                Forms\Components\TextInput::make('ubication')->required(),

                Forms\Components\TextInput::make('price')->required()
<<<<<<< HEAD
                    ->rule('numeric'),
=======
                                                        ->rule('numeric')
                                                        ->minValue(0.01)
                                                        ->validationMessages([
                                                            'required' => 'The amount is required.',
                                                            'numeric' => 'The amount must be a number.',
                                                            'min' => 'El importe debe ser superior a cero',
                                                        ]),
>>>>>>> 11e1411340113bd82820817872f59eca616bf76f
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name'),
                Forms\Components\Radio::make('type')->options([
                    'Income' => 'Income',
                    'Expense' => 'Expense',
                ]),
            ])->columnSpan(1)->columns(2),
            Section::make('Meta')
                    ->schema([
                    Group::make()->schema([
                    TagsInput::make('tags')->required(),
                    ]),       

                       
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('order-images')
                    ->multiple()
                    ->image(),
                ])->columnSpan(1),
                    
                Group::make()->schema([
                    
                ]),

                    ])->columns(2);
            
    }

    public static function table(Table $table): Table

    {
        return $table
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
