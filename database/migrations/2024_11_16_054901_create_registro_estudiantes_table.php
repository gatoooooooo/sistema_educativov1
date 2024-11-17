<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroEstudiantesTable extends Migration
{
    public function up()
    {
        Schema::create('registro_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_estudiantes');
    }
}