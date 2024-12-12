<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si no es el predeterminado
    protected $table = 'secciones';

    protected $fillable = ['nombre', 'curso_id', 'docente_id', 'horario_id', 'capacidad'];


    // Relación con el curso
    public function Curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relación con el docente
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    // Relación con los estudiantes
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'seccion_estudiante', 'seccion_id', 'registro_estudiante_id');
    }


    public function Horario()
    {
        return $this->belongsTo(Horario::class);
    }
    // Agregar un estudiante a la sección
    public function agregarEstudiante(Estudiante $estudiante)
    {
        // Verificar si hay espacio en la sección
        if ($this->estudiantes()->count() < $this->capacidad) {
            $this->estudiantes()->attach($estudiante);
            return true;
        }
        return false;
    }

    // Eliminar un estudiante de la sección
    public function eliminarEstudiante(RegistroEstudiante $estudiante)
    {
        // Verificar si el estudiante está registrado en esta sección
        if ($this->estudiantes()->where('registro_estudiante_id', $estudiante->id)->exists()) {
            $this->estudiantes()->detach($estudiante);
            return true;
        }
        return false;
    }
}
