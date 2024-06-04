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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('desnivel');
            $table->string('mapa');
            $table->integer('max_participantes');
            $table->integer('km');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->string('salida');
            $table->string('cartel');
            $table->float('precio_patrocinar');
            $table->float('precio_inscripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla 'carreras'
        Schema::dropIfExists('carreras');
    }
};
