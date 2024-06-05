<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Dotenv\Parser\Value;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }


    protected function getStats(): array
    {
        return [

                //Stat::make('Unique views', '192.1k')
                  //                          ->description('32k increase')
                  //                          ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                  //                          ->chart([7, 2, 10, 3, 15, 4, 17])
                  //                          ->color('success'),
              //  Stat::make('Bounce rate', '21%')
              //                              ->description('7% decrease')
                //                            ->descriptionIcon('heroicon-m-arrow-trending-down')
                //                            ->color('danger'),
               // Stat::make('Average time on page', '3:12')
               //                             ->description('3% increase')
              //                              ->descriptionIcon('heroicon-m-arrow-trending-up')
              //                              ->color('success'),
              //  Stat::make('Processed', '192.1k')
                 //                           ->color('success')
                 //                           ->extraAttributes([
                  //                              'class' => 'cursor-pointer',
                  //                              'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                          //                  ]),
                          Stat::make('Ingresos', Order::where('type', 'income')
                                                                     ->sum('price')/100)
                                                                     ->description('ingresos totales')
                                                                     ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                                                                     ->color('success')
                                                                     ->chart([1, 2, 3, 4, 5, 1, 1, 1]),

                          Stat::make(label: 'Gastos', value:Order::where('type','expense')
                                                                      ->sum('price')/100)
                                                                      ->description('gastos totales')
                                                                      ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                                                                      ->color('danger')
                                                                      ->chart([1, 2, 3, 4, 5, 1, 1, 1]),




                    ];
                }
            }


    //protected static ?string $pollingInterval = '10s';


