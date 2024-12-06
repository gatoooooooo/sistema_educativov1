<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    // Mostrar todos los grados
    public function index()
    {
        $grados = Grado::all();
        return view('grados.index', compact('grados'));
    }

    // Mostrar el formulario para crear un nuevo grado
    public function create()
    {
        return view('grados.create');
    }

    // Guardar un nuevo grado en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:grados',
            'descripcion' => 'nullable|string|max:500',
        ]);

        Grado::create($request->all());

        return redirect()->route('admin.grados.index')->with('success', 'Grado registrado correctamente');
    }

    // Mostrar el formulario para editar un grado
    public function edit($id)
    {
        $grado = Grado::findOrFail($id);
        return view('grados.edit', compact('grado'));
    }

    // Actualizar los datos de un grado
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:grados,nombre,' . $id,
            'descripcion' => 'nullable|string|max:500',
        ]);

        $grado = Grado::findOrFail($id);
        $grado->update($request->all());

        return redirect()->route('admin.grados.index')->with('success', 'Grado actualizado correctamente');
    }

    // Eliminar un grado
    public function destroy($id)
    {
        $grado = Grado::findOrFail($id);
        $grado->delete();

        return redirect()->route('admin.grados.index')->with('success', 'Grado eliminado correctamente');
    }
}
