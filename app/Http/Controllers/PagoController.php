<?php
<<<<<<< HEAD
=======

>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Estudiante;
use Illuminate\Http\Request;

<<<<<<< HEAD
        class PagoController extends Controller
        {
            public function index()
            {
                $pagos = Pago::with('estudiante')->get();
                return view('pagos.index', compact('pagos'));
            }

            public function create()
            {
                $estudiantes = Estudiante::all();
                return view('pagos.create', compact('estudiantes'));
            }

            public function store(Request $request)
        {
            // Validar los datos del formulario
            $request->validate([
                'registro_estudiante_id' => 'required|exists:registro_estudiantes,id',
                'monto' => 'required|numeric|min:0',
                'fecha_pago' => 'required|date',
                'Tipo de pago' => 'required|in:Matricula,Mensualidad',
                'metodo_pago' => 'required|in:Efectivo,Transferencia,Tarjeta de Crédito',
                'referencia' => 'nullable|string|max:255',
            ]);

            // Crear el pago con la fecha de registro automática
            Pago::create([
                'registro_estudiante_id' => $request->registro_estudiante_id,
                'monto' => $request->monto,
                'fecha_pago' => $request->fecha_pago,
                'estado' => $request->estado,
                'metodo_pago' => $request->metodo_pago,
                'referencia' => $request->referencia,
                'fecha_registro' => now(), // Fecha actual
            ]);

            // Redirigir al índice con un mensaje de éxito
            return redirect()->route('admin.pagos.index')->with('success', 'Pago registrado correctamente.');
        }


            public function destroy($id)
            {
                $pago = Pago::findOrFail($id);
                $pago->delete();

                return redirect()->route('admin.pagos.index')->with('success', 'Pago eliminado correctamente.');
            }
        }
=======
class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('estudiante')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('pagos.create', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'registro_estudiante_id' => 'required|exists:registro_estudiantes,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'estado' => 'required|in:Pagado,Pendiente,Vencido',
            'metodo_pago' => 'required|in:Efectivo,Transferencia,Tarjeta de Crédito',
            'referencia' => 'nullable|string|max:255',
            'fecha_registro' => 'required|date',
        ]);

        Pago::create($request->all());

        return redirect()->route('admin.pagos.index')->with('success', 'Pago registrado correctamente.');
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('admin.pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
