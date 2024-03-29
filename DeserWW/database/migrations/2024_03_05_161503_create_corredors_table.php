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
        Schema::create('corredors', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('contrasena');
            $table->string('direccion');
            $table->date('nacimiento');
            $table->enum('nivel', ['PRO', 'OPEN'])->nullable();
            $table->boolean('socio')->nullable();
            $table->string('numero_federado')->nullable();
            $table->unsignedBigInteger('id_seguro')->nullable();
            $table->enum('rol', ['usuario', 'admin']);
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_seguro')->references('id')->on('seguros')->nullable();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corredors');
    }
};
