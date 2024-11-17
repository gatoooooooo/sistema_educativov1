<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromediosTable extends Migration
{
    public function up()
    {
        Schema::create('promedios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('registro_estudiantes')->onDelete('cascade');
            $table->decimal('nota1', 5, 2);
            $table->decimal('nota2', 5, 2);
            $table->decimal('nota3', 5, 2);
            $table->decimal('promedio', 5, 2)->storedAs('(nota1 + nota2 + nota3) / 3');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promedios');
    }
}