<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained()->onDelete('cascade'); // Relación con la tabla de cursos
            $table->string('dia'); // Día de la semana
            $table->time('hora_inicio'); // Hora de inicio
            $table->time('hora_fin'); // Hora de fin
            $table->time('hora_recreo')->nullable(); // Hora de recreo, este campo es opcional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
