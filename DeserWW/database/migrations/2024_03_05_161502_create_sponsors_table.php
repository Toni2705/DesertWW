<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('CIF')->unique();
            $table->string('logo');
            $table->string('direccion');
            $table->boolean('principal');
            // Otras columnas que puedas necesitar
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla 'sponsors'
        Schema::dropIfExists('sponsors');
    }
};
