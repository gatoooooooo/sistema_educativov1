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
        'dni',
        'correo',
        'fecha_nacimiento',
        'direccion',
        'telefono',
    ];
}