<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = ['estudiante_id', 'nota1', 'nota2', 'nota3'];  // Los campos que se pueden llenar automáticamente

    // Relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);  // Un estudiante tiene muchas notas
    }
}
