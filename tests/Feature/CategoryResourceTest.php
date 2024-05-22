<?php
use App\Filament\Resources\CategoryResource;
use App\Models\Category;

use App\Models\User;
use Database\Factories\CategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Livewire\Livewire;
use function Pest\Livewire\livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;


uses(RefreshDatabase::class);




test('aaa', function () {
  $this->get('/')
    //->assertRedirect('/login')
    ->assertStatus(200);

});

test('bbbb', function () {

  //$user = User::factory()->create();

  $this
  
    ->get('/admin')
    //->assertRedirect('/login')
    ->assertOk();

});


it('can render page', function () {
  $this->get(CategoryResource::getUrl('index'))->assertSuccessful();
});


it('can list posts', function () {
  $posts = Category::factory()->count(10)->create();

  livewire(CategoryResource\Pages\ListCategories::class)
      ->assertCanSeeTableRecords($posts);
});

