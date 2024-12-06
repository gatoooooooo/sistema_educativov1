<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionesTable extends Migration
{
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->id(); // ID de la sección
            $table->string('nombre'); // Nombre o código de la sección
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); // Relación con cursos
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade'); // Relación con docentes
            $table->foreignId('horario_id')->nullable()->constrained('horarios')->onDelete('set null'); // Relación con horarios
            $table->integer('capacidad')->default(30); // Número máximo de estudiantes
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('secciones');
    }
}
