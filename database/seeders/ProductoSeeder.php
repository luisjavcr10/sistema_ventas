<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {

        // ABARROTES
        Producto::create([
            'nombre' => 'Azucar rubia COSTEÑO',
            'descripcion' => '1k de la mejor azucar del norte del pais.',
            'precio' => 3.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 1
        ]);

        Producto::create([
            'nombre' => 'Aceite PRIMOR',
            'descripcion' => '1l de aceite vegetal de alta calidad.',
            'precio' => 7,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 1
        ]);

        Producto::create([
            'nombre' => 'Tallarin DON VICTORIO',
            'descripcion' => '1/2k de excelente pasta.',
            'precio' => 3,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 1
        ]);

        Producto::create([
            'nombre' => 'Sal EMSAL',
            'descripcion' => '1k de Sal de alta pureza, ideal para todos los usos culinarios.',
            'precio' => 2,
            'stock' => 20,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 1
        ]);

        Producto::create([
            'nombre' => 'Arroz COSTEÑO',
            'descripcion' => '1k del mejor arroz del norte del pais, combinando origenes peruano y asiaticos.',
            'precio' => 3.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 1
        ]);

        //  ENLATADOS

        Producto::create([
            'nombre' => 'Grated de Atún BELLS',
            'descripcion' => 'Lata de grated, contiene 170g.',
            'precio' => 4.3,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 2
        ]);

        Producto::create([
            'nombre' => 'Durazno en mitades BELLS',
            'descripcion' => '820g de frescos duraznos en mitades',
            'precio' => 8.2,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 2
        ]);

        Producto::create([
            'nombre' => 'Filete de Atún Primor',
            'descripcion' => 'Lata de filete, contiene 140g. ',
            'precio' => 5.9,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 2
        ]);

        Producto::create([
            'nombre' => 'Conserva de fruta ARICA',
            'descripcion' => '820g de fresca fruta',
            'precio' => 8.9,
            'stock' => 20,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 2
        ]);

        Producto::create([
            'nombre' => 'Conserva de pechuga de pollo ALDELIS',
            'descripcion' => '155g de deliciosa pechuga de pollo',
            'precio' => 7.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 2
        ]);

        //LACTEOS

        Producto::create([
            'nombre' => 'Yogurt Descremado SLIM',
            'descripcion' => '1.7Kg de yogurt descremado',
            'precio' => 8.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 3
        ]);

        Producto::create([
            'nombre' => 'Mantequilla GLORIA',
            'descripcion' => '390g de mantequilla especial',
            'precio' => 16.1,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 3
        ]);

        Producto::create([
            'nombre' => 'Yogurt Griego GLORIA',
            'descripcion' => '120gr de yogurt griego a base de frutos rojos.',
            'precio' => 2.2,
            'stock' => 25,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 3
        ]);

        Producto::create([
            'nombre' => 'Leche GLORIA',
            'descripcion' => '900ml de leche evaporada.',
            'precio' => 5,
            'stock' => 20,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 3
        ]);

        Producto::create([
            'nombre' => 'Yogurt DAMLAC',
            'descripcion' => '900gr de yogurt de alta calidad.',
            'precio' => 10.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 3
        ]);

        // LIMPIEZA

        Producto::create([
            'nombre' => 'Detergente MARSELLA',
            'descripcion' => '4kg de detergente aromaterápia.',
            'precio' => 44.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 4
        ]);

        Producto::create([
            'nombre' => 'Papel Higiénico SUAVE',
            'descripcion' => '40 rollos de resistemax doble hoja.',
            'precio' => 27.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 4
        ]);

        Producto::create([
            'nombre' => 'Suavisante BOLIVAR',
            'descripcion' => '1.5l de suavisante aroma floral Doypack',
            'precio' => 15,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 4
        ]);

        Producto::create([
            'nombre' => 'Limpiador POETT',
            'descripcion' => '3.8lts de limpiador frescura lavanda.',
            'precio' => 15.7,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 4
        ]);

        Producto::create([
            'nombre' => 'Lejia SAPOLIO',
            'descripcion' => '5000g de lejia tradicional.',
            'precio' => 10.9,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 4
        ]);

        // BEBIDAS

        Producto::create([
            'nombre' => 'Six Pack Pilsen CALLAO',
            'descripcion' => '6 latas de 473ml cada una',
            'precio' => 25.9,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 5
        ]);

        Producto::create([
            'nombre' => '500ml Coca Cola',
            'descripcion' => '500ml de refrescante bebida gaseosa',
            'precio' => 3.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 5
        ]);

        Producto::create([
            'nombre' => '500ml Inka Cola',
            'descripcion' => '500ml de refrescante bebida gaseosa',
            'precio' => 3.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 5
        ]);

        Producto::create([
            'nombre' => 'Jugo Gloria',
            'descripcion' => '1l de bebida de frutas',
            'precio' => 4.5,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 5
        ]);

        Producto::create([
            'nombre' => 'Whisky 40° JACK DANIELS',
            'descripcion' => '750ml de whisky',
            'precio' => 105,
            'stock' => 10,
            'fecha_vencimiento' => '2024-12-31',
            'categoria_id'=> 5
        ]);
    }
}
