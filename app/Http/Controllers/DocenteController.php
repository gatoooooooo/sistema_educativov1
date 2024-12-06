<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // Mostrar el formulario para crear un nuevo docente
    public function create()
    {
        return view('docentes.create');
    }

    // Guardar un nuevo docente en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:docentes',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'dni' => 'required|string|max:15|unique:docentes',
        ]);

        Docente::create($request->all());

        return redirect()->route('admin.docentes.index');
    }

    // Mostrar todos los docentes
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    // Mostrar el formulario para editar un docente
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    // Actualizar los datos de un docente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:docentes,correo_electronico,' . $id,
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'dni' => 'required|string|max:15|unique:docentes,dni,' . $id,
        ]);

        $docente = Docente::findOrFail($id);
        $docente->update($request->all());

        return redirect()->route('admin.docentes.index');
    }

    // Eliminar un docente
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();

        return redirect()->route('admin.docentes.index');
    }
}