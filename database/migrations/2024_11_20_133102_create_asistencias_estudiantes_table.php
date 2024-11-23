<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asistencias_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->date('fecha');
            $table->enum('estado', ['presente', 'ausente', 'justificado']);
            $table->timestamps();

            // Relación con la tabla registro_estudiantes
            $table->foreign('estudiante_id')->references('id')->on('registro_estudiantes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias_estudiantes');
    }
};
