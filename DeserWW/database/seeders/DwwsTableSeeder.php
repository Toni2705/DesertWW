<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DwwsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('dwws')->insert([
            'nombre' => 'Desert WorldWide',
            'CIF' => 'DW123',
            'telefono' => '777 33 69 10',
            'direccion' => 'Avenida Internacional 456',
            'precio_principal' => 500.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
