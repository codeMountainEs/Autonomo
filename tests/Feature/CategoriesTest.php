<?php

use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {

    $this->actingAs(User::factory()->create()); 

});

