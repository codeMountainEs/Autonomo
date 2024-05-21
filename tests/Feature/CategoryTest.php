<?php

use App\Filament\Resources\CategoryResource;

it('can render page', function () {
    $this->get(CategoryResource::getUrl('index'))->assertSuccessful();
});
