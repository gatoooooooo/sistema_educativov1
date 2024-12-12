<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class NotaController extends Controller
{
<<<<<<< HEAD
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
=======
    public function index()
    {
        $notas = Nota::all();
        return view('notas.index', compact('notas'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('notas.create', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'registro_estudiante_id' => 'required|exists:registro_estudiantes,id', // Cambio aquí
            'curso_id' => 'required|exists:cursos,id',
        ]);

        Nota::create([
            'registro_estudiante_id' => $request->registro_estudiante_id,
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
            'curso_id' => $request->curso_id,
            'nota1' => null,
            'nota2' => null,
            'nota3' => null,
            'fecha' => now(),
            'comentarios' => null,
        ]);

<<<<<<< HEAD
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.notas.index')->with('success', 'Estudiante y curso asignados correctamente.');
    }

    // Otros métodos permanecen igual
=======
        return redirect()->route('admin.notas.index')->with('success', 'Estudiante y curso asignados correctamente.');
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.edit', compact('nota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nota1' => 'required|in:AD,A,B,C',
            'nota2' => 'required|in:AD,A,B,C',
            'nota3' => 'required|in:AD,A,B,C',
            'comentarios' => 'nullable|string|max:255',
        ]);

        $nota = Nota::findOrFail($id);
        $nota->update([
            'nota1' => $request->nota1,
            'nota2' => $request->nota2,
            'nota3' => $request->nota3,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->route('notas.index')->with('success', 'Notas actualizadas correctamente.');
    }

    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect()->route('notas.index')->with('success', 'Nota eliminada correctamente.');
    }
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
}
