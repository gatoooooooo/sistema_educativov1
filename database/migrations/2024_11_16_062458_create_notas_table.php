<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('registro_estudiantes');  // Relacionar con estudiantes
            $table->decimal('nota1', 5, 2);  // Nota 1
            $table->decimal('nota2', 5, 2);  // Nota 2
            $table->decimal('nota3', 5, 2);  // Nota 3
            $table->timestamps();  // Fecha de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
