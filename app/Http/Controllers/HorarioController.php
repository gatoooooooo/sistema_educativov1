<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    // Mostrar el formulario para crear un nuevo horario
    public function create($curso_id)
    {
        $curso = Curso::findOrFail($curso_id);
        return view('horarios.create', compact('curso'));
    }

    // Almacenar un nuevo horario
    public function store(Request $request, $curso_id)
    {
        $request->validate([
            'dia' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'hora_recreo' => 'nullable|date_format:H:i|after:hora_inicio',
        ]);

        Horario::create([
            'curso_id' => $curso_id,
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'hora_recreo' => $request->hora_recreo,
        ]);

        return redirect()->route('horarios.index', $curso_id)->with('success', 'Horario registrado correctamente');
    }

    // Mostrar todos los horarios de un curso
    public function index($curso_id)
    {
        $curso = Curso::findOrFail($curso_id);
        $horarios = Horario::where('curso_id', $curso_id)->get();
        return view('horarios.index', compact('horarios', 'curso'));
    }
}
