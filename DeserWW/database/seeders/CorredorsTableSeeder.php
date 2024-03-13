<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorredorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('corredors')->insert([
            'dni' => '12345678Z',
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'contrasena' => bcrypt('contrasena123'),
            'direccion' => 'Calle Runner 1',
            'nacimiento' => '1990-01-01',
            'nivel' => 'PRO',
            'socio' => true,
            'numero_federado' => 'FED123',
            'id_seguro' => 1,
            'rol' => 'usuario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('corredors')->insert([
            'dni' => '12345678S',
            'nombre' => 'Sergi',
            'apellidos' => 'Alonso Alomar',
            'contrasena' => bcrypt('user'),
            'direccion' => 'Calle Corredor 2',
            'nacimiento' => '1995-05-15',
            'nivel' => 'OPEN',
            'socio' => false,
            'numero_federado' => null,
            'id_seguro' => 2,
            'rol' => 'usuario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('corredors')->insert([
            'dni' => '12345678T',
            'nombre' => 'Toni',
            'apellidos' => 'Rubio',
            'contrasena' => bcrypt('user'),
            'direccion' => 'Calle Atleta 3',
            'nacimiento' => '1988-09-20',
            'nivel' => 'PRO',
            'socio' => true,
            'numero_federado' => 'FED456',
            'id_seguro' => 1,
            'rol' => 'usuario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('corredors')->insert([
            'dni' => '12345678D',
            'nombre' => 'Laura',
            'apellidos' => 'Gomez',
            'contrasena' => bcrypt('contrasena123'),
            'direccion' => 'Calle Jogger 4',
            'nacimiento' => '1992-03-10',
            'nivel' => 'PRO',
            'socio' => false,
            'numero_federado' => null,
            'id_seguro' => 2,
            'rol' => 'usuario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('corredors')->insert([
            'dni' => '12345678E',
            'nombre' => 'María',
            'apellidos' => 'López',
            'contrasena' => bcrypt('contrasena123'),
            'direccion' => 'Calle Corredora 5',
            'nacimiento' => '1993-07-25',
            'nivel' => 'OPEN',
            'socio' => true,
            'numero_federado' => 'FED789',
            'id_seguro' => 3,
            'rol' => 'usuario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('corredors')->insert([
            'dni' => '12345678A',
            'nombre' => 'Admin',
            'apellidos' => 'Admin',
            'contrasena' => bcrypt('admin'),
            'direccion' => 'Calle Corredora 5',
            'nacimiento' => '1993-07-25',
            'rol' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
