<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
<<<<<<< HEAD
    /**
     * Ejecutar la migración.
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id(); // ID único de la nota
            $table->unsignedBigInteger('registro_estudiante_id'); // FK a registro_estudiantes
            $table->unsignedBigInteger('curso_id'); // FK a cursos
            $table->string('nota1')->nullable(); // Nota 1 (puede ser nula)
            $table->string('nota2')->nullable(); // Nota 2 (puede ser nula)
            $table->string('nota3')->nullable(); // Nota 3 (puede ser nula)
            $table->date('fecha')->nullable(); // Fecha de asignación de la nota
            $table->text('comentarios')->nullable(); // Comentarios sobre las notas
            $table->timestamps(); // created_at y updated_at

            // Relaciones de claves foráneas
            $table->foreign('registro_estudiante_id')
                ->references('id')
                ->on('registro_estudiantes')
                ->onDelete('cascade'); // Eliminar notas si el estudiante es eliminado

            $table->foreign('curso_id')
                ->references('id')
                ->on('cursos')
                ->onDelete('cascade'); // Eliminar notas si el curso es eliminado
        });
    }

    /**
     * Revertir la migración.
     */
=======
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_estudiante_id'); // FK a registro_estudiantes
            $table->unsignedBigInteger('curso_id'); // FK a cursos
            $table->string('nota1')->nullable();
            $table->string('nota2')->nullable();
            $table->string('nota3')->nullable();
            $table->date('fecha')->nullable();
            $table->text('comentarios')->nullable();
            $table->timestamps();
    
            $table->foreign('registro_estudiante_id')->references('id')->on('registro_estudiantes')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
