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
        Schema::create('dorsals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_corredor');
            $table->unsignedBigInteger('id_carrera');
            $table->string('qr');
            $table->string('dorsal'); // Nuevo campo 'dorsal'
            // Otras columnas que puedas necesitar
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_corredor')->references('id')->on('corredors');
            $table->foreign('id_carrera')->references('id')->on('carreras');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dorsals');
    }
};
