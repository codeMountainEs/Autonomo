<?php

namespace App\Filament\Resources\OrderlinesResource\Pages;

use App\Filament\Resources\OrderlinesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderlines extends EditRecord
{
    protected static string $resource = OrderlinesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['price'] = $data['price'] / 100;
        $data['import'] = $data['import'] / 100;
        return $data;

    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['price'] = $data['price'] * 100;
        $data['import'] = $data['import'] * 100;
        return $data;
    }

}
