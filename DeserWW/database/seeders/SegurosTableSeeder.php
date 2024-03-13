<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SegurosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('seguros')->insert([
            'nombre' => 'Adeslas',
            'CIF' => 'ABC123',
            'direccion' => 'Calle Principal 123',
            'precio' => 500.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seguros')->insert([
            'nombre' => 'DKV',
            'CIF' => 'DEF456',
            'direccion' => 'Avenida Secundaria 456',
            'precio' => 600.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seguros')->insert([
            'nombre' => 'Seguros Loli',
            'CIF' => 'GHI123',
            'direccion' => 'Calle Lola 123',
            'precio' => 500.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seguros')->insert([
            'nombre' => 'Aseguradora Paqui',
            'CIF' => 'ABC456',
            'direccion' => 'Avenida Francisco 456',
            'precio' => 600.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seguros')->insert([
            'nombre' => 'Conchi Secure',
            'CIF' => 'DEF123',
            'direccion' => 'Calle Choni 123',
            'precio' => 500.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
