<?php


use App\Filament\Resources\CategoryResource;
use App\Models\Category;

it('puede renderizar la pagina index', function () {
    $this->get(CategoryResource::getUrl('index'))->assertSuccessful();
});

it('puede renderizar la pagina create', function () {
    $this->get(CategoryResource::getUrl('create'))->assertSuccessful();
});

it('puede renderizar la pagina edit', function () {
    // Crear un registro de prueba usando el factory
    $category = Category::factory()->create();

    // Generar la URL con el ID del registro usando la ruta nombrada
    $url = route('filament.admin.resources.categories.edit', $category->id);

    // Verificar que la página de edición se puede renderizar
    $this->get($url)->assertSuccessful();
});
