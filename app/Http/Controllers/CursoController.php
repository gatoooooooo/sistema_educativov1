<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    {
        $cursos = Curso::all(); // Recuperamos todos los cursos
        return view('cursos.index', compact('cursos'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        return view('cursos.create');
    }

    // Guardar un nuevo curso
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        Curso::create($request->all()); // Crear el curso en la base de datos

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito!');
    }

    // Mostrar un curso específico
    public function show($id)
    {
        $curso = Curso::findOrFail($id); // Buscar el curso por su ID
        return view('cursos.show', compact('curso'));
    }

    // Mostrar el formulario para editar un curso
    public function edit($id)
    {
        $curso = Curso::findOrFail($id); // Buscar el curso por su ID
        return view('cursos.edit', compact('curso'));
    }

    // Actualizar un curso
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $curso = Curso::findOrFail($id); // Buscar el curso por su ID
        $curso->update($request->all()); // Actualizar los datos del curso

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito!');
    }

    // Eliminar un curso
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id); // Buscar el curso por su ID
        $curso->delete(); // Eliminar el curso

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito!');
    }
}
