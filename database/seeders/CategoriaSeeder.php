<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Abarrotes',
            'descripcion' => 'Todo tipo de insumos comestibles.',
        ]);

        Categoria::create([
            'nombre' => 'Enlatados',
            'descripcion' => 'Todo tipo de productos enlatado.',
        ]);

        Categoria::create([
            'nombre' => 'Lácteos',
            'descripcion' => 'Leche y derivados.',
        ]);

        Categoria::create([
            'nombre' => 'Articulos de limpieza',
            'descripcion' => 'Todo tipo de productos para el higiene.',
        ]);

        Categoria::create([
            'nombre' => 'Bebidas',
            'descripcion' => 'Todo tipo de bebidas, gasificadas, alcoholicas, etc.',
        ]);
    }
}
