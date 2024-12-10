<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // Mostrar todas las notas
    public function index()
    {
        $notas = Nota::all(); // Obtener todas las notas
        return view('notas.index', compact('notas')); // Pasamos las notas a la vista
    }

    // Mostrar el formulario para asignar un estudiante y un curso
    public function create()
    {
        $estudiantes = Estudiante::all(); // Obtener todos los estudiantes
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('notas.create', compact('estudiantes', 'cursos')); // Pasamos los estudiantes y cursos a la vista
    }

    // Almacenar la asignación en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id', // Verifica que el estudiante existe
            'curso_id' => 'required|exists:cursos,id', // Verifica que el curso existe
        ]);

        // Crear una nueva relación con las notas vacías
        Nota::create([
            'registro_estudiante_id' => $request->estudiante_id, // Se corrige el nombre del campo
            'curso_id' => $request->curso_id,
            'nota1' => null,
            'nota2' => null,
            'nota3' => null,
            'fecha' => now(),
            'comentarios' => null,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.notas.index')->with('success', 'Estudiante y curso asignados correctamente.');
    }

    // Otros métodos permanecen igual
}
