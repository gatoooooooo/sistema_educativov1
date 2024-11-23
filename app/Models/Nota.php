<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistroEstudiante; // Importa el modelo RegistroEstudiante

class Nota extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'notas';

    // Habilitar asignación masiva
    protected $fillable = ['registro_estudiante_id', 'curso_id', 'nota1', 'nota2', 'nota3', 'fecha', 'comentarios'];

    // Relación con RegistroEstudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'registro_estudiante_id');    }

    // Relación con Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
