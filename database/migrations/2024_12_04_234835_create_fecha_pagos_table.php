<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechaPagosTable extends Migration
{
    public function up()
    {
        Schema::create('fecha_pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pago');
            $table->enum('tipo_matricula', ['Primera', 'Segunda', 'Tercera']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fecha_pagos');
    }
}
