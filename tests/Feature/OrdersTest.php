<?php

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\Models\Orderlines;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

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

it('puede crear un order con image', function () {
    // Obtén la ruta de la imagen de prueba
    $imagePath = 'test_images/test_image.jpeg';

    // Finge el almacenamiento para evitar que se guarden imágenes en disco
    Storage::fake('public');

    // Crea un archivo de imagen ficticio utilizando la imagen de prueba
    $image = UploadedFile::fake()->image($imagePath);

    // Crea un registro de prueba usando el factory y adjunta la imagen
    $faker = Faker::create();
    $orderImage = Order::factory()->create([
        'n_docu' => $faker->randomNumber(6),
        'description' => $faker->sentence,
        'ubication' => $faker->address,
        'price' => $faker->numberBetween(100, 10000),
        'category_id' => null,
        'image' => $image, // Adjunta la imagen de prueba
        'type' => $faker->randomElement(['Income', 'Expense']),
    ]);

    // Genera la URL con el ID del registro usando la ruta nombrada
    $url = route('filament.admin.resources.orders.edit', ['record' => $orderImage]);

    // Verifica que la página de edición se pueda renderizar
    $this->get($url)->assertSuccessful();
});

it('crear un OrderLines', function () {
    $orderlines = Orderlines::factory()->create();

    $url = route('filament.admin.resources.orders.edit', ['record' => $orderlines]);

    $this->get($url)->assertSuccessful();
});
