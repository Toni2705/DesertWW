<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatrocinansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('patrocinans')->insert([
            'carrera_id' => 1,
            'sponsor_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('patrocinans')->insert([
            'carrera_id' => 1,
            'sponsor_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('patrocinans')->insert([
            'carrera_id' => 2,
            'sponsor_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('patrocinans')->insert([
            'carrera_id' => 3,
            'sponsor_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('patrocinans')->insert([
            'carrera_id' => 4,
            'sponsor_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Agrega más datos según sea necesario
    }
}
