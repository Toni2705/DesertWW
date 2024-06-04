<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Sponsor;
use Database\Factories\SponsorFactory;

class CreateSponsorTest extends TestCase
{
    public function test_create_sponsor(): void
    {
        if ($this->assertDatabaseMissing('sponsors',['CIF'=>'TES456'])) {
            Sponsor::factory()->create([
                'nombre'=> 'Sponsor Test',
                'CIF'=> 'TES456',
                'logo'=> 'sponsors/logo_test.png',
                'direccion'=> 'Plaza Test 123',
                'principal'=> '0',
                'created_at'=> now(),
                'updated_at'=> now(),
    
            ]);
            $this->assertDatabaseHas('sponsors',[
                'nombre'=> 'Sponsor Test',
                'CIF'=> 'TES456',
                'logo'=> 'sponsors/logo_test.png',
                'direccion'=> 'Plaza Test 123',
                'principal'=> '0',
            ]);
    
        }
    }
}
