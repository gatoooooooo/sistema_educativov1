<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FechaPago extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_pago',
        'tipo_matricula',
    ];
}
