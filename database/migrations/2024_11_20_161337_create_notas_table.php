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
            $table->foreignId('registro_estudiante_id')->constrained('registro_estudiantes')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->decimal('nota1', 5, 2);
            $table->decimal('nota2', 5, 2);
            $table->decimal('nota3', 5, 2);
            $table->date('fecha');
            $table->text('comentarios')->nullable(); // Campo opcional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
