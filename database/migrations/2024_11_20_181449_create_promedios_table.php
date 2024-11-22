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
            $table->foreignId('registro_estudiante_id')->constrained('registro_estudiantes');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->decimal('promedio_final', 5, 2); // Promedio final
            $table->date('fecha_calculo'); // Fecha de cálculo del promedio
            $table->text('comentarios')->nullable(); // Comentarios opcionales
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promedios');
    }
}
