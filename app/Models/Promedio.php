<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promedio extends Model
{
    use HasFactory;

    protected $fillable = ['registro_estudiante_id', 'curso_id', 'promedio_final', 'fecha_calculo', 'comentarios'];

    // Relación con RegistroEstudiante
    public function estudiante()
    {
        return $this->belongsTo(RegistroEstudiante::class, 'registro_estudiante_id');
    }

    // Relación con Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    // Método para calcular el promedio de las notas
    public static function calcularPromedio($registroEstudianteId, $cursoId)
    {
        $notas = Nota::where('registro_estudiante_id', $registroEstudianteId)
                    ->where('curso_id', $cursoId)
                    ->get();

        if ($notas->count() > 0) {
            $promedio = $notas->avg(function ($nota) {
                return ($nota->nota1 + $nota->nota2 + $nota->nota3) / 3; // Promedio de las 3 notas
            });

            return $promedio;
        }

        return null; // Si no hay notas, devuelve null
    }
}
