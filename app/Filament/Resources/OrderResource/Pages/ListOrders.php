<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;


class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTabs(): array 
    {
        return [
            'all' => Tab::make(' All Orders'),
            'ingresos' => Tab::make('Expense')
                ->modifyQueryUsing(function ($query){
                    return $query->where('type','Expense');
                }),
            'gastos' => Tab::make('Income') ->modifyQueryUsing(function ($query){
                return $query->where('type','Income');                
            }),

        ];
    }



    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
