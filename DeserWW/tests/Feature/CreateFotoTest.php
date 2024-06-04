<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Foto;
use Database\Factories\FotoFactory;
class CreateFotoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_foto(): void
    {
       if ($this->assertDatabaseMissing('fotos',['carrera_id'=>'3'])) {
        Foto::factory()->create([
            'carrera_id'=> '1',
            'foto'=> 'images/fotosCarrera/milhouse-2023-04-02_12-58-44.jpg',
            'created_at'=> now(),
            'updated_at'=> now(),

        ]);
        $this->assertDatabaseHas('fotos',[
            'carrera_id'=> '1',
            'foto'=> 'images/fotosCarrera/milhouse-2023-04-02_12-58-44.jpg',
        ]);

    }
    }
}
