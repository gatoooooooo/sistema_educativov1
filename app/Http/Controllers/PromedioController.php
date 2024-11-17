<?php

namespace App\Http\Controllers;

use App\Models\Promedio;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class PromedioController extends Controller
{
    public function index()
    {
        $promedios = Promedio::with('estudiante')->get();
        return view('promedios.index', compact('promedios'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('promedios.create', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'nota1' => 'required|numeric|min:0|max:10',
            'nota2' => 'required|numeric|min:0|max:10',
            'nota3' => 'required|numeric|min:0|max:10',
        ]);

        Promedio::create($request->all());

        return redirect()->route('promedios.index')->with('success', 'Promedio creado exitosamente.');
    }

    public function edit(Promedio $promedio)
    {
        $estudiantes = Estudiante::all();
        return view('promedios.edit', compact('promedio', 'estudiantes'));
    }

    public function update(Request $request, Promedio $promedio)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'nota1' => 'required|numeric|min:0|max:10',
            'nota2' => 'required|numeric|min:0|max:10',
            'nota3' => 'required|numeric|min:0|max:10',
        ]);

        $promedio->update($request->all());

        return redirect()->route('promedios.index')->with('success', 'Promedio actualizado exitosamente.');
    }

    public function destroy(Promedio $promedio)
    {
        $promedio->delete();

        return redirect()->route('promedios.index')->with('success', 'Promedio eliminado exitosamente.');
    }
}
