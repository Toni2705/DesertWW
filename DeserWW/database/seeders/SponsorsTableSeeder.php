<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('sponsors')->insert([
            'nombre' => 'Nike',
            'CIF' => 'GHI101',
            'logo' => 'sponsors/logo_nike.png',
            'direccion' => 'Plaza Central 789',
            'principal' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sponsors')->insert([
            'nombre' => 'HP',
            'CIF' => 'JKL012',
            'logo' => 'sponsors/logo_hp.png',
            'direccion' => 'Esquina Norte 012',
            'principal' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sponsors')->insert([
            'nombre' => 'Adidas',
            'CIF' => 'GHI709',
            'logo' => 'sponsors/logo_adidas.png',
            'direccion' => 'Plaza Toro 789',
            'principal' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sponsors')->insert([
            'nombre' => 'Audi',
            'CIF' => 'JKL032',
            'logo' => 'sponsors/logo_audi.png',
            'direccion' => 'Esquina Sur 012',
            'principal' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sponsors')->insert([
            'nombre' => 'Ferrari',
            'CIF' => 'GHI289',
            'logo' => 'sponsors/logo_ferrari.png',
            'direccion' => 'Plaza Principal 789',
            'principal' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
