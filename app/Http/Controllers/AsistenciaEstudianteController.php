<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaEstudiante;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class AsistenciaEstudianteController extends Controller
{
    // Mostrar todas las asistencias
    public function index()
    {
        $asistencias = AsistenciaEstudiante::all(); // Puedes personalizar la consulta si es necesario
        return view('asistencias.index', compact('asistencias'));
    }

    // Mostrar el formulario para registrar una nueva asistencia
    public function create()
    {
        $estudiantes = Estudiante::all(); // Obtener todos los estudiantes
        return view('asistencias.create', compact('estudiantes'));
    }

    // Registrar una nueva asistencia
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'estudiante_id' => 'required|exists:registro_estudiantes,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        // Crear el registro de asistencia
        AsistenciaEstudiante::create([
            'estudiante_id' => $request->estudiante_id,
            'fecha' => $request->fecha,
            'estado' => $request->estado,
        ]);

        return redirect()->route('admin.asistencias.index')->with('success', 'Asistencia registrada correctamente.');
    }

    // Mostrar el formulario para editar una asistencia
    public function edit($id)
    {
        $asistencia = AsistenciaEstudiante::findOrFail($id);
        $estudiantes = Estudiante::all();
        return view('asistencias.edit', compact('asistencia', 'estudiantes'));
    }

    // Actualizar una asistencia
    public function update(Request $request, $id)
    {
        // Validación
        $request->validate([
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        // Encontrar la asistencia a actualizar
        $asistencia = AsistenciaEstudiante::findOrFail($id);

        // Actualizar la asistencia
        $asistencia->update([
            'fecha' => $request->fecha,
            'estado' => $request->estado,
        ]);

        return redirect()->route('admin.asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    // Eliminar una asistencia
    public function destroy($id)
    {
        $asistencia = AsistenciaEstudiante::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('admin.asistencias.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}
