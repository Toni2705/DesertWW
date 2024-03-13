<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DorsalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('dorsals')->insert([
            'id_corredor' => 1,
            'id_carrera' => 1,
            'qr' => 'qr_code_a.png',
            'dorsal' => 'D001',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 2,
            'id_carrera' => 1,
            'qr' => 'qr_code_b.png',
            'dorsal' => 'D002',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 3,
            'id_carrera' => 2,
            'qr' => 'qr_code_c.png',
            'dorsal' => 'D003',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 4,
            'id_carrera' => 2,
            'qr' => 'qr_code_d.png',
            'dorsal' => 'D004',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Corredor con nombre "Sergi Alonso Alomar" y DNI "12345678S"
        DB::table('dorsals')->insert([
            'id_corredor' => 5,
            'id_carrera' => 3,
            'qr' => 'qr_code_e.png',
            'dorsal' => 'D005',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Corredor con nombre "Toni Rubio" y DNI "12345678T"
        DB::table('dorsals')->insert([
            'id_corredor' => 6,
            'id_carrera' => 3,
            'qr' => 'qr_code_f.png',
            'dorsal' => 'D006',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 1,
            'id_carrera' => 2,
            'qr' => 'qr_code_g.png',
            'dorsal' => 'D007',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 2,
            'id_carrera' => 2,
            'qr' => 'qr_code_h.png',
            'dorsal' => 'D008',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 3,
            'id_carrera' => 3,
            'qr' => 'qr_code_i.png',
            'dorsal' => 'D009',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 4,
            'id_carrera' => 4,
            'qr' => 'qr_code_j.png',
            'dorsal' => 'D010',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
