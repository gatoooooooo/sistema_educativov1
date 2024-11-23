<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';  // Nombre de la tabla
    protected $fillable = ['nombre', 'apellido', 'correo_electronico', 'direccion', 'telefono', 'dni'];
}
