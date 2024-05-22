<?php


namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a este factory.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'tipo' => $this->faker->randomElement(['Hogar', 'Comida', 'Ocio']), // Asegúrate de ajustar los valores según tu aplicación
        ];
    }
}