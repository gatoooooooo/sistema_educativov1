<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaDocente;
use App\Models\Docente;
use Illuminate\Http\Request;

class AsistenciaDocenteController extends Controller
{
    public function index()
    {
        $asistencias = AsistenciaDocente::all();
        return view('asistencias_docentes.index', compact('asistencias'));
    }

    public function create()
    {
        $docentes = Docente::all();
        return view('asistencias_docentes.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        AsistenciaDocente::create($request->all());

        return redirect()->route('admin.asistencias_docentes.index')->with('success', 'Asistencia registrada correctamente.');
    }

    public function edit($id)
    {
        $asistencia = AsistenciaDocente::findOrFail($id);
        $docentes = Docente::all();
        return view('asistencias_docentes.edit', compact('asistencia', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        $asistencia = AsistenciaDocente::findOrFail($id);
        $asistencia->update($request->all());

<<<<<<< HEAD
        return redirect()->route('admin.asistencias_docentes.index')->with('success', 'Asistencia actualizada correctamente.');
=======
        return redirect()->route('asistencias_docentes.index')->with('success', 'Asistencia actualizada correctamente.');
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    }

    public function destroy($id)
    {
        $asistencia = AsistenciaDocente::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('admin.asistencias_docentes.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}
