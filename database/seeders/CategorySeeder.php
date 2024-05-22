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
            'tipo' => 'alimentacion',
        ]);

        Category::create([
            'name' => 'Combustible',
            'tipo' => 'combustible',
        ]);

        Category::create([
            'name' => 'Ropa',
            'tipo' => 'ropa',
        ]);

        Category::create([
            'name' => 'Calzado',
            'tipo' => 'calzado',
        ]);

        Category::create([
            'name' => 'Materias Primas',
            'tipo' => 'materias_primas',
        ]);

        Category::create([
            'name' => 'Servicios Prestados',
            'tipo' => 'servicios_prestados',
        ]);
    }
}
