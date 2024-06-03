<?php

namespace Database\Factories;

use App\Models\Orderlines;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderlinesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orderlines::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => \App\Models\Order::factory(),
            'product_id' => \App\Models\Product::factory(),
            'description' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 1000),
            'import' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
