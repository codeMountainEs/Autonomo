<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'n_docu' => '1',
            'description' => 'Supermercado',
            'ubication' => 'Madrid',
            'price' => '8900',
            'type' => 'Expense',
            'category_id' => 2,
        ]);
        Order::create([
            'n_docu' => '2',
            'description' => 'Comida',
            'ubication' => 'Alcala.Sl',
            'price' => '3499',
            'type' => 'Expense',
            'category_id' => 1,
        ]);
        Order::create([
            'n_docu' => '3',
            'description' => 'Gasolinera',
            'ubication' => 'Madrid',
            'price' => '8900',
            'type' => 'Expense',
            'category_id' => 2,
        ]);
        Order::create([
            'n_docu' => '4',
            'description' => 'aceite de motor',
            'ubication' => 'Motor.Sl',
            'price' => '4499',
            'type' => 'Expense',
            'category_id' => 5,
        ]);
        Order::create([
            'n_docu' => '5',
            'description' => 'Reparacion Baño',
            'ubication' => 'Granada',
            'price' => '8693200',
            'type' => 'Income',
            'category_id' => 6,
        ]);
    }
}
