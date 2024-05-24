<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Producto1',
            'price' =>'8900',

    ]);
        Product::create([
            'name' => 'Producto2',
            'price' =>'8000',

    ]);
        Product::create([
            'name' => 'Producto3',
            'price' =>'800',

        ]);
        Product::create([
            'name' => 'Producto4',
            'price' =>'300',

        ]);
        Product::create([
            'name' => 'Producto5',
            'price' =>'50',

    ]);
    }
}
