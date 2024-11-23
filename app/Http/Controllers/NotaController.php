<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante; // Importa el modelo Estudiante
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

    // Mostrar el formulario para crear una nueva nota
    public function create()
    {
        $estudiantes = Estudiante::all(); // Obtener todos los estudiantes
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('notas.create', compact('estudiantes', 'cursos')); // Pasamos los estudiantes y cursos a la vista
    }

    // Almacenar una nueva nota
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'registro_estudiante_id' => 'required|exists:registro_estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'nota1' => 'required|numeric|min:0|max:20',
            'nota2' => 'required|numeric|min:0|max:20',
            'nota3' => 'required|numeric|min:0|max:20',
            'fecha' => 'required|date',
            'comentarios' => 'nullable|string|max:255', // Comentarios opcionales
        ]);

        // Crear la nueva nota
        Nota::create([
            'registro_estudiante_id' => $request->registro_estudiante_id,
            'curso_id' => $request->curso_id,
            'nota1' => $request->nota1,
            'nota2' => $request->nota2,
            'nota3' => $request->nota3,
            'fecha' => $request->fecha,
            'comentarios' => $request->comentarios, // Los comentarios son opcionales
        ]);

        // Redirigir a la vista principal de notas con un mensaje de éxito
        return redirect()->route('admin.notas.index')->with('success', 'Nota registrada correctamente.');
    }

    // Mostrar el formulario para editar una nota existente
    public function edit($id)
    {
        // Buscar la nota por su id
        $nota = Nota::findOrFail($id);
        // Obtener todos los estudiantes y cursos
        $estudiantes = Estudiante::all(); // Cambiar RegistroEstudiante por Estudiante
        $cursos = Curso::all();
        return view('notas.edit', compact('nota', 'estudiantes', 'cursos')); // Pasamos la nota, estudiantes y cursos a la vista
    }

    // Actualizar una nota
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'registro_estudiante_id' => 'required|exists:registro_estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'nota1' => 'required|numeric|min:0|max:20',
            'nota2' => 'required|numeric|min:0|max:20',
            'nota3' => 'required|numeric|min:0|max:20',
            'fecha' => 'required|date',
            'comentarios' => 'nullable|string|max:255', // Comentarios opcionales
        ]);

        // Buscar la nota por su id
        $nota = Nota::findOrFail($id);
        // Actualizar los datos de la nota
        $nota->update([
            'registro_estudiante_id' => $request->registro_estudiante_id,
            'curso_id' => $request->curso_id,
            'nota1' => $request->nota1,
            'nota2' => $request->nota2,
            'nota3' => $request->nota3,
            'fecha' => $request->fecha,
            'comentarios' => $request->comentarios,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.notas.index')->with('success', 'Nota actualizada correctamente.');
    }

    // Eliminar una nota
    public function destroy($id)
    {
        // Buscar la nota por su id
        $nota = Nota::findOrFail($id);
        // Eliminar la nota
        $nota->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.notas.index')->with('success', 'Nota eliminada correctamente.');
    }
}
