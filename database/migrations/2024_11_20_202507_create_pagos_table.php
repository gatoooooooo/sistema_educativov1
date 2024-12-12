<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_estudiante_id'); // Relación con estudiantes
            $table->decimal('monto', 10, 2); // Monto del pago
            $table->date('fecha_pago'); // Fecha de pago
            $table->enum('Tipo de Pago', ['Matricula', 'Mensualidad']); // Estado del pago
            $table->enum('metodo_pago', ['Efectivo', 'Transferencia', 'Tarjeta de Crédito']); // Método de pago
            $table->string('referencia')->nullable(); // Número de recibo o transacción
            $table->timestamp('fecha_registro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->foreign('registro_estudiante_id')->references('id')->on('registro_estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
