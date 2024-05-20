<?php

namespace App\Filament\Resources\OrderlinesResource\Pages;

use App\Filament\Resources\OrderlinesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderlines extends ListRecords
{
    protected static string $resource = OrderlinesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
