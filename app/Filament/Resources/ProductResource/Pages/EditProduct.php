<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['price'] = $data['price'] / 100;
        return $data;
    }
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
