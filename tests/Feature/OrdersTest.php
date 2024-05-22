<?php

use App\Filament\Resources\OrderResource;
use App\Models\Order;

it('puede renderizar la pagina index', function () {
    $this->get(OrderResource::getUrl('index'))->assertSuccessful();
});

it('puede renderizar la pagina create', function () {
    $this->get(OrderResource::getUrl('create'))->assertSuccessful();
});

it('puede renderizar la pagina edit', function () {
    // Crear un registro de prueba usando el factory
    $orderId = Order::factory()->create();

    /// Generar la URL con el ID del registro usando la ruta nombrada
    $url = route('filament.admin.resources.orders.edit', ['record' => $orderId]);

    // Verificar que la página de edición se puede renderizar
    $this->get($url)->assertSuccessful();
});
