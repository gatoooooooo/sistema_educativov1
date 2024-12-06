<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionEstudianteTable extends Migration
{
    public function up()
    {
        Schema::create('seccion_estudiante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            $table->foreignId('registro_estudiante_id')->constrained('registro_estudiantes')->onDelete('cascade');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('seccion_estudiante');
    }
}
