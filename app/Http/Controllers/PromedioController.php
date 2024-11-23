<?php

namespace App\Http\Controllers;

use App\Models\Promedio;
use App\Models\Nota;
use App\Models\RegistroEstudiante;
use App\Models\Curso;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromedioController extends Controller
{
    // Mostrar la lista de promedios
    public function index()
    {
        // Obtener todos los promedios junto con sus relaciones
        $promedios = Promedio::with('estudiante', 'curso')->get(); 
        return view('promedios.index', compact('promedios'));
    }

    // Método para generar el promedio
    public function generarPromedio($registroEstudianteId, $cursoId)
    {
        // Verificar si ya existe un promedio para ese estudiante y curso
        $existePromedio = Promedio::where('registro_estudiante_id', $registroEstudianteId)
                                    ->where('curso_id', $cursoId)
                                    ->exists();

        if ($existePromedio) {
            return redirect()->route('admin.promedios.index')->with('error', 'El promedio ya ha sido calculado para este estudiante y curso.');
        }

        // Obtener todas las notas del estudiante en ese curso
        $notas = Nota::where('registro_estudiante_id', $registroEstudianteId)
                     ->where('curso_id', $cursoId)
                     ->get();

        // Verificar si el estudiante tiene notas para ese curso
        if ($notas->isEmpty()) {
            return redirect()->route('admin.promedios.index')->with('error', 'No se encontraron notas para el estudiante en este curso.');
        }

        // Calcular el promedio
        $totalNotas = $notas->sum(function($nota) {
            return ($nota->nota1 + $nota->nota2 + $nota->nota3) / 3;
        });
        $promedioFinal = $totalNotas / $notas->count(); // Promedio de las notas

        // Crear el nuevo promedio en la base de datos
        Promedio::create([
            'registro_estudiante_id' => $registroEstudianteId,
            'curso_id' => $cursoId,
            'promedio_final' => $promedioFinal,
            'fecha_calculo' => Carbon::now(), // Fecha de cálculo
            'comentarios' => 'Promedio calculado automáticamente.',
        ]);

        return redirect()->route('admin.promedios.index')->with('success', 'Promedio calculado y registrado correctamente.');
    }

    // Método para eliminar un promedio
    public function destroy($id)
    {
        $promedio = Promedio::findOrFail($id);
        $promedio->delete();

        return redirect()->route('admin.promedios.index')->with('success', 'Promedio eliminado correctamente.');
    }
}
