<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Corredor;
use Database\Factories\CorredorFactory;

class CreateCorredorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_corredor(): void
    {
       if ($this->assertDatabaseMissing('corredors',['dni'=>'53638890S'])) {
        Corredor::factory()->create([
            'dni'=> '53638890S',
            'nombre'=> 'Pablo',
            'apellidos'=> 'Mateo',
            'contrasena'=> 'admin',
            'direccion'=> 'Calle pajares',
            'nacimiento'=> '2003-05-27',
            'nivel'=> 'PRO',
            'socio'=> '1',
            'numero_federado'=> 'FED768',
            'rol'=> 'usuario',
            'created_at'=> now(),
            'updated_at'=> now(),

        ]);
        $this->assertDatabaseHas('corredors',[
            'dni'=> '53638890S',
            'nombre'=> 'Pablo',
            'apellidos'=> 'Mateo',
            'contrasena'=> 'admin',
            'direccion'=> 'Calle pajares',
            'nacimiento'=> '2003-05-27',
            'nivel'=> 'PRO',
            'socio'=> '1',
            'numero_federado'=> 'FED768',
            'rol'=> 'usuario',
        ]);

    }
    }
}
