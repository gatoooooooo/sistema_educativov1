<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    // Agregar los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',       // El nombre del grado
        'descripcion',  // La descripción del grado
    ];
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'grado_id');
    }
}
