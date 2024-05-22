<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ShowCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowCategoriesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ShowCategories::class)
            ->assertStatus(200);
    }
}
