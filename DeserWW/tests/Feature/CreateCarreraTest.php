<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Carrera;
use Database\Factories\CarreraFactory;

class CreateCarreraTest extends TestCase
{
    public function test_create_carrera(): void
    {
        if ($this->assertDatabaseMissing('carreras',['nombre'=>'Carrera Test2'])) {
            Carrera::factory()->create([
                'nombre'=> 'Carrera Test2',
                'descripcion'=> 'Es la carrera para hacer el test.',
                'desnivel'=> '200',
                'mapa'=> 'maps/carrera_test.png',
                'max_participantes'=> '150',
                'km'=> '7',
                'fecha_inicio'=> '2024-07-12',
                'hora_inicio'=> '10:00:00',
                'salida'=> 'Calle2',
                'cartel'=> 'images/carteles/posterTest.jpg',
                'precio_patrocinar'=> '2500',
                'precio_inscripcion'=> '15',
                'created_at'=> now(),
                'updated_at'=> now(),
    
            ]);
            $this->assertDatabaseHas('carreras',[
                'nombre'=> 'Carrera Test2',
                'descripcion'=> 'Es la carrera para hacer el test.',
                'desnivel'=> '200',
                'mapa'=> 'maps/carrera_test.png',
                'max_participantes'=> '150',
                'km'=> '7',
                'fecha_inicio'=> '2024-07-12',
                'hora_inicio'=> '10:00:00',
                'salida'=> 'Calle2',
                'cartel'=> 'images/carteles/posterTest.jpg',
                'precio_patrocinar'=> '2500',
                'precio_inscripcion'=> '15',
            ]);
    
        }
    }
}
