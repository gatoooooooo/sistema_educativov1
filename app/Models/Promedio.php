<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promedio extends Model
{
    use HasFactory;

    // Campos rellenables
    protected $fillable = ['estudiante_id', 'nota1', 'nota2', 'nota3'];

    // Relación con estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
