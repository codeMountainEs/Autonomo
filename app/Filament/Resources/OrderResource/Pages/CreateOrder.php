<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['price'] <= 0) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'price' => 'El importe debe ser superior a cero',
            ]);
        }
        $data['price'] = $data['price'] * 100;
        return $data;

    }





}
