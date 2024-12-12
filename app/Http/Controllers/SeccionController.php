<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    // Mostrar todas las secciones con sus relaciones
    public function index()
    {
        $secciones = Seccion::with(['estudiantes', 'curso', 'docente', 'horario'])->get();
        $estudiantes = Estudiante::all(); // Traemos todos los estudiantes para agregarlos
        return view('secciones.index', compact('secciones', 'estudiantes'));
    }

    // Mostrar el formulario para crear una nueva sección
    public function create()
    {
        $cursos = Curso::all();
        $docentes = Docente::all();
        $horarios = Horario::all();
        $estudiantes = Estudiante::all();  // Obtener todos los estudiantes disponibles
        return view('secciones.create', compact('cursos', 'docentes', 'horarios', 'estudiantes'));
    }

    // Guardar una nueva sección en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
            'docente_id' => 'required|exists:docentes,id',
            'horario_id' => 'required|exists:horarios,id',
            'capacidad' => 'required|integer|min:1',
        ]);

        $seccion = Seccion::create($request->all());

        // Agregar estudiantes seleccionados a la nueva sección
        if ($request->has('estudiantes')) {
            $seccion->estudiantes()->attach($request->estudiantes);
        }

        return redirect()->route('admin.secciones.index');
    }

    // Mostrar el formulario para editar una sección
    public function edit($id)
    {
        $seccion = Seccion::findOrFail($id);
        $cursos = Curso::all();
        $docentes = Docente::all();
        $horarios = Horario::all();
        $estudiantes = Estudiante::all();  // Obtener todos los estudiantes disponibles
        return view('secciones.edit', compact('seccion', 'cursos', 'docentes', 'horarios', 'estudiantes'));
    }

    // Actualizar los datos de una sección
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
            'docente_id' => 'required|exists:docentes,id',
            'horario_id' => 'required|exists:horarios,id',
            'capacidad' => 'required|integer|min:1',
        ]);

        $seccion = Seccion::findOrFail($id);
        $seccion->update($request->all());

        // Actualizar los estudiantes si es necesario
        if ($request->has('estudiantes')) {
            $seccion->estudiantes()->sync($request->estudiantes);  // Reemplaza los estudiantes de la sección
        }

        return redirect()->route('admin.secciones.index');
    }

    // Eliminar una sección
    public function destroy($id)
    {
        $seccion = Seccion::findOrFail($id);
        $seccion->delete();  // Eliminar la sección
        return redirect()->route('admin.secciones.index')->with('success', 'Sección eliminada correctamente.');
    }

    // Agregar un estudiante a una sección
    public function agregarEstudiante($id, Request $request)
    {
        $seccion = Seccion::findOrFail($id);
        $estudiantes = Estudiante::find($request->estudiantes); // Obtiene los estudiantes seleccionados

        foreach ($estudiantes as $estudiante) {
            // Verificar si la sección tiene espacio
            if ($seccion->estudiantes()->count() < $seccion->capacidad) {
                $seccion->estudiantes()->attach($estudiante); // Agregar estudiante a la sección
            }
        }

        return redirect()->route('admin.secciones.index')->with('success', 'Estudiantes agregados exitosamente.');
    }

    // Eliminar un estudiante de una sección
    public function eliminarEstudiante($id, $estudiante_id)
    {
        $seccion = Seccion::findOrFail($id);
        $estudiante = Estudiante::findOrFail($estudiante_id);

        // Verificar si el estudiante está asignado a la sección
        if ($seccion->estudiantes()->where('registro_estudiante_id', $estudiante->id)->exists()) {
            $seccion->estudiantes()->detach($estudiante); // Eliminar estudiante de la sección
            return redirect()->route('admin.secciones.index')->with('success', 'Estudiante eliminado exitosamente.');
        }

        return redirect()->route('admin.secciones.index')->with('error', 'El estudiante no está asignado a esta sección.');
    }
}
