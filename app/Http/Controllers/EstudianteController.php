<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Grado;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Mostrar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::with(['grado'])->get();  // Relación con Grado
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Mostrar el formulario para crear un nuevo estudiante
    public function create()
    {
        $grados = Grado::all();  // Obtener todos los grados
        return view('estudiantes.create', compact('grados'));
    }

    // Guardar un nuevo estudiante en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:500',
            'telefono' => 'nullable|string|max:15',
            'correo_electronico' => 'nullable|email',
            'grado_id' => 'required|exists:grados,id',
            'fecha_ingreso' => 'required|date',
            'documento_tipo' => 'required|string|max:50',
            'documento_numero' => 'required|string|max:50',
            'genero' => 'required|in:masculino,femenino',  // Validación de género
            'fecha_nacimiento' => 'required|date',  // Validación de fecha de nacimiento
        ]);

        // Crear un nuevo estudiante con los datos recibidos
        Estudiante::create($request->all());

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante registrado correctamente');
    }

    // Mostrar el formulario para editar un estudiante
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $grados = Grado::all();  // Obtener todos los grados
        return view('estudiantes.edit', compact('estudiante', 'grados'));
    }

    // Actualizar los datos de un estudiante
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:500',
            'telefono' => 'nullable|string|max:15',
            'correo_electronico' => 'nullable|email',
            'grado_id' => 'required|exists:grados,id',
            'fecha_ingreso' => 'required|date',
            'documento_tipo' => 'required|string|max:50',
            'documento_numero' => 'required|string|max:50',
            'genero' => 'required|in:masculino,femenino',  // Validación de género
            'fecha_nacimiento' => 'required|date',  // Validación de fecha de nacimiento
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante actualizado correctamente');
    }

    // Eliminar un estudiante
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante eliminado correctamente');
    }

    // Mostrar los detalles de un estudiante
    public function show($id)
    {
        // Buscar el estudiante por su ID, incluyendo la relación con el grado
        $estudiante = Estudiante::with('grado')->findOrFail($id);

        // Pasar los datos del estudiante a la vista 'show'
        return view('estudiantes.show', compact('estudiante'));
    }
}
