<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => 'Carrera A',
            'descripcion' => 'Una emocionante carrera en el desierto.',
            'desnivel' => 500,
            'mapa' => 'maps/mapa_a.png',
            'max_participantes' => 100,
            'km' => 10,
            'fecha_inicio' => '2024-05-01',
            'hora_inicio' => '08:00:00',
            'salida' => 'Parque Principal',
            'cartel' => 'images/carteles/poster5.jpg',
            'precio_patrocinar' => 1000.00,
            'precio_inscripcion' => 20.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'Rally DWW 2025',
            'descripcion' => 'La carrera más desafiante del mundo, a través del desierto y terrenos difíciles.',
            'desnivel' => 1000,
            'mapa' => 'maps/rally_dww_2025.png',
            'max_participantes' => 300,
            'km' => 5000,
            'fecha_inicio' => '2025-01-01',
            'hora_inicio' => '09:00:00',
            'salida' => 'Ciudad Principal',
            'cartel' => 'images/carteles/poster4.jpg',
            'precio_patrocinar' => 5000.00,
            'precio_inscripcion' => 500.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'Desafío del Desierto 2025',
            'descripcion' => 'Una carrera extrema a través de los desiertos más inhóspitos, desafiando a los pilotos a superar todos los obstáculos.',
            'desnivel' => 800,
            'mapa' => 'maps/desafio_desierto_2025.png',
            'max_participantes' => 200,
            'km' => 4000,
            'fecha_inicio' => '2025-03-01',
            'hora_inicio' => '10:30:00',
            'salida' => 'Pueblo Remoto',
            'cartel' => 'images/carteles/poster3.jpg',
            'precio_patrocinar' => 4000.00,
            'precio_inscripcion' => 400.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'Raid del Desierto 2025',
            'descripcion' => 'Una competición de resistencia en las vastas extensiones del desierto, poniendo a prueba la habilidad y la resistencia de los conductores.',
            'desnivel' => 1200,
            'mapa' => 'maps/raid_desierto_2025.png',
            'max_participantes' => 250,
            'km' => 5500,
            'fecha_inicio' => '2025-05-01',
            'hora_inicio' => '08:00:00',
            'salida' => 'Oasis Central',
            'cartel' => 'images/carteles/poster2.jpg',
            'precio_patrocinar' => 6000.00,
            'precio_inscripcion' => 600.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'Gran Desafío del Sahara 2025',
            'descripcion' => 'Una carrera épica a través del Sahara, desafiando a los conductores a conquistar las dunas más altas y los terrenos más difíciles.',
            'desnivel' => 1500,
            'mapa' => 'maps/gran_desafio_sahara_2025.png',
            'max_participantes' => 350,
            'km' => 6000,
            'fecha_inicio' => '2025-07-01',
            'hora_inicio' => '07:00:00',
            'salida' => 'Pueblo del Desierto',
            'cartel' => 'images/carteles/poster1.jpg',
            'precio_patrocinar' => 7000.00,
            'precio_inscripcion' => 700.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
