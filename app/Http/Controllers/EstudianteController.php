<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));// Renderiza la vista con los datos
    }


    public function create()
    {
        return view('estudiantes.create'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:registro_estudiantes,dni',
            'correo' => 'required|email|unique:registro_estudiantes,correo',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante')); // Pasa el estudiante a la vista
    }

    
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:registro_estudiantes,dni,' . $estudiante->id,
            'correo' => 'required|email|unique:registro_estudiantes,correo,' . $estudiante->id,
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete(); 

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
