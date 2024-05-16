<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Alimentación',
        ]);

        Category::create([
            'name' => 'Combustible',
        ]);


        Category::create([
            'name' => 'Ropa',
        ]);


        Category::create([
            'name' => 'Calzado',
        ]);


        Category::create([
            'name' => 'Materias Primas',
        ]);

        Category::create([
            'name' => 'Servicios Prestados',
        ]);





    }

}
