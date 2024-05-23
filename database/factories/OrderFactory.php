<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'n_docu' => $this->faker->randomNumber(6),
            'description' => $this->faker->sentence,
            'ubication' => $this->faker->address,
            'price' => $this->faker->numberBetween(100, 10000),
            'category_id' => null, // Ajusta según tus necesidades
            'image' => $this->faker->imageUrl(), // Podrías usar una imagen de prueba
            'type' => $this->faker->randomElement(['Income', 'Expense']),
        ];
    }
}
