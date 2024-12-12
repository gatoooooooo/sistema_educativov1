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
            $table->string('apellido', 100);
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->unsignedBigInteger('grado_id'); // Clave foránea para grado
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade'); // Relación con la tabla grados
            // $table->unsignedBigInteger('seccion_id'); // Clave foránea para sección (si decides reactivarla)
            // $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade'); // Relación con la tabla secciones
            $table->date('fecha_ingreso');

            // Información de los padres
            $table->string('nombre_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('telefono_padre')->nullable();
            $table->string('telefono_madre')->nullable();

            // Datos del documento
            $table->enum('documento_tipo', ['DNI', 'Carnet de extranjería', 'Pasaporte', 'Otro'])->default('DNI');  // Tipo de documento
            $table->string('documento_numero')->unique();  // Número de documento

            // Nuevo campo de género (masculino o femenino)
            $table->enum('genero', ['Masculino', 'Femenino'])->nullable();  // Género del estudiante

            // Nuevo campo de fecha de nacimiento
            $table->date('fecha_nacimiento')->nullable();  // Fecha de nacimiento del estudiante

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_estudiantes');
    }
}
