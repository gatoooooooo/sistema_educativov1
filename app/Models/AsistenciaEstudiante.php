<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaEstudiante extends Model
{
    use HasFactory;

    // Nombre de la tabla (si no sigue la convención de nombres)
    protected $table = 'asistencias_estudiantes';

    // Si se usan timestamps (ya está activado por defecto)
    public $timestamps = true;

    // Campos asignables masivamente
    protected $fillable = ['estudiante_id', 'fecha', 'estado'];

    // Relación: una asistencia pertenece a un estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }
}
