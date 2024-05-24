<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

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
