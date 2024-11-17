<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar la contraseña
        ]);

        return response()->json($usuario, 201);
    }

    // Obtener todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    // Obtener un usuario específico
    public function show($id)
    {
        $usuario = Usuario::with(['registroHorarios', 'registroCursos'])->findOrFail($id);
        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }
};
