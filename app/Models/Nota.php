<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'registro_estudiante_id',
        'curso_id',
        'nota1',
        'nota2',
        'nota3',
        'fecha',
        'comentarios',
<<<<<<< HEAD
        'fecha_registro',

=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    ];

    // Relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'registro_estudiante_id');
    }

    // Relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
