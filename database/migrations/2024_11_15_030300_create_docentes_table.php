<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();  // ID autoincrementable
            $table->string('nombre');  // Nombre del docente
            $table->string('apellido');  // Apellido del docente
            $table->string('correo_electronico')->unique();  // Correo electrónico, único
            $table->string('direccion')->nullable();  // Dirección (opcional)
            $table->string('telefono')->nullable();  // Teléfono (opcional)
            $table->string('dni')->unique();  // DNI único
            $table->timestamps();  // Fecha de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('docentes');  // Elimina la tabla si la migración se revierte
    }
}