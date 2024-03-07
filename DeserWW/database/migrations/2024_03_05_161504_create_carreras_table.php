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
            $table->unsignedBigInteger('id_sponsor');
            // Otras columnas que puedas necesitar
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_sponsor')->references('id')->on('sponsors');
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
