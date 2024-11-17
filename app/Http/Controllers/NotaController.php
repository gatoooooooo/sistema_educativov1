<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // Mostrar todas las notas
    public function index()
    {
        $notas = Nota::all();  // Obtener todas las notas
        return view('notas.index', compact('notas'));  // Pasar las notas a la vista
    }

    // Mostrar formulario para crear una nueva nota
    public function create()
    {
        $estudiantes = Estudiante::all();  // Obtener todos los estudiantes
        return view('notas.create', compact('estudiantes'));  // Mostrar formulario de creación de notas
    }

    // Guardar una nueva nota en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:registro_estudiantes,id',  // Validar que el estudiante exista
            'nota1' => 'required|numeric|min:0|max:10',
            'nota2' => 'required|numeric|min:0|max:10',
            'nota3' => 'required|numeric|min:0|max:10',
        ]);

        Nota::create($request->all());  // Crear la nueva nota

        return redirect()->route('notas.index')->with('success', 'Nota registrada exitosamente.');  // Redirigir con mensaje de éxito
    }

    // Mostrar formulario para editar una nota
    public function edit(Nota $nota)
    {
        $estudiantes = Estudiante::all();  // Obtener todos los estudiantes
        return view('notas.edit', compact('nota', 'estudiantes'));  // Mostrar formulario de edición
    }

    // Actualizar la nota en la base de datos
    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:registro_estudiantes,id',  // Validar que el estudiante exista
            'nota1' => 'required|numeric|min:0|max:10',
            'nota2' => 'required|numeric|min:0|max:10',
            'nota3' => 'required|numeric|min:0|max:10',
        ]);

        $nota->update($request->all());  // Actualizar la nota

        return redirect()->route('notas.index')->with('success', 'Nota actualizada exitosamente.');  // Redirigir con mensaje de éxito
    }

    // Eliminar una nota
    public function destroy(Nota $nota)
    {
        $nota->delete();  // Eliminar la nota

        return redirect()->route('notas.index')->with('success', 'Nota eliminada exitosamente.');  // Redirigir con mensaje de éxito
    }
}
