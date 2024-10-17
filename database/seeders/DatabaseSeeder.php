<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Empleado;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        Cliente::factory(20)->create();
        //Categoria::factory(5)->create();
        //Producto::factory()->count(10)->create();
        Empleado::factory(20)->create();
    }
}
