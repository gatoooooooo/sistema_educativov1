<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'registro_estudiantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo_electronico',
        'grado_id',
        'fecha_ingreso',
        'nombre_padre',
        'nombre_madre',
        'telefono_padre',
        'telefono_madre',
        'documento_tipo',
        'documento_numero',
        'genero',  // Agregado
        'fecha_nacimiento',  // Agregado
    ];

    // Relación con el modelo Grado
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }

    // Relación con el modelo Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    // Relación con el modelo Nota
    public function notas()
    {
        return $this->hasMany(Nota::class, 'registro_estudiante_id');
    }

    // Relación con el modelo Sección (relación muchos a muchos)
    public function secciones()
    {
        return $this->belongsToMany(Seccion::class, 'seccion_estudiante');
    }

    // Relación con el modelo Asistencia
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'estudiante_id');
    }
}
