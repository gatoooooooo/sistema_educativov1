<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla si no sigue la convención de plural
    protected $fillable = ['nombre', 'email', 'password']; // Campos que se pueden rellenar
}
