<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'registro_estudiante_id',
        'monto',
        'fecha_pago',
<<<<<<< HEAD
        'Tipo de pago ',
=======
        'estado',
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
        'metodo_pago',
        'referencia',
        'fecha_registro',
    ];

    // Relación con estudiantes
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'registro_estudiante_id');
    }
}
