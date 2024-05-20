<?php

namespace App\Filament\Resources\OrderlinesResource\Pages;

use App\Filament\Resources\OrderlinesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderlines extends CreateRecord
{
    protected static string $resource = OrderlinesResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['price'] = $data['price'] / 100;
        $data['import'] = $data['import'] * $data['quantity'] * 100;
        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['price'] = $data['price'] * 100;
        $data['import'] = $data['import'] * 100;
        return $data;
    }

}
