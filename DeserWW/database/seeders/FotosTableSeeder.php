<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fotos para la Carrera A (carrera_id: 1)
        DB::table('fotos')->insert([
            'carrera_id' => 1,
            'foto' => 'public/images/carreras/01-FOT01.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 1,
            'foto' => 'public/images/carreras/01-FOT02.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 1,
            'foto' => 'public/images/carreras/01-FOT03.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 1,
            'foto' => 'public/images/carreras/01-FOT04.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 1,
            'foto' => 'public/images/carreras/01-FOT05.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fotos para la Rally DWW 2025 (carrera_id: 2)
        DB::table('fotos')->insert([
            'carrera_id' => 2,
            'foto' => 'public/images/carreras/02-FOT01.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 2,
            'foto' => 'public/images/carreras/02-FOT02.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 2,
            'foto' => 'public/images/carreras/02-FOT03.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 2,
            'foto' => 'public/images/carreras/02-FOT04.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 2,
            'foto' => 'public/images/carreras/02-FOT05.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fotos para la Desafío del Desierto 2025 (carrera_id: 3)
        DB::table('fotos')->insert([
            'carrera_id' => 3,
            'foto' => 'public/images/carreras/03-FOT01.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 3,
            'foto' => 'public/images/carreras/03-FOT02.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 3,
            'foto' => 'public/images/carreras/03-FOT03.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 3,
            'foto' => 'public/images/carreras/03-FOT04.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 3,
            'foto' => 'public/images/carreras/03-FOT05.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fotos para la Raid del Desierto 2025 (carrera_id: 4)
        DB::table('fotos')->insert([
            'carrera_id' => 4,
            'foto' => 'public/images/carreras/04-FOT01.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 4,
            'foto' => 'public/images/carreras/04-FOT02.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 4,
            'foto' => 'public/images/carreras/04-FOT03.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 4,
            'foto' => 'public/images/carreras/04-FOT04.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 4,
            'foto' => 'public/images/carreras/04-FOT05.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fotos para la Gran Desafío del Sahara 2025 (carrera_id: 5)
        DB::table('fotos')->insert([
            'carrera_id' => 5,
            'foto' => 'public/images/carreras/05-FOT01.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 5,
            'foto' => 'public/images/carreras/05-FOT02.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 5,
            'foto' => 'public/images/carreras/05-FOT03.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 5,
            'foto' => 'public/images/carreras/05-FOT04.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('fotos')->insert([
            'carrera_id' => 5,
            'foto' => 'public/images/carreras/05-FOT05.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
