<?php

namespace App\Http\Controllers;

use App\Models\FechaPago;
use Illuminate\Http\Request;

class FechaPagoController extends Controller
{
    // Mostrar todas las fechas de pago
    public function index()
    {
        $fechas_pagos = FechaPago::all();
        return view('fecha_pagos.index', compact('fechas_pagos'));
    }

    // Mostrar formulario para crear una nueva fecha de pago
    public function create()
    {
        return view('fecha_pagos.create');
    }

    // Almacenar una nueva fecha de pago
    public function store(Request $request)
    {
        $request->validate([
            'fecha_pago' => 'required|date',
            'tipo_matricula' => 'required|in:Primera,Segunda,Tercera',
        ]);

        FechaPago::create($request->all());

        return redirect()->route('admin.fecha_pagos.index')->with('success', 'Fecha de pago registrada correctamente.');
    }

    // Mostrar formulario para editar una fecha de pago
    public function edit($id)
    {
        $pago = FechaPago::findOrFail($id);
        return view('fecha_pagos.edit', compact('pago'));
    }

    // Actualizar una fecha de pago existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_pago' => 'required|date',
            'tipo_matricula' => 'required|in:Primera,Segunda,Tercera',
        ]);

        $pago = FechaPago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('admin.fecha_pagos.index')->with('success', 'Fecha de pago actualizada correctamente.');
    }

    // Eliminar una fecha de pago
    public function destroy($id)
    {
        $pago = FechaPago::findOrFail($id);
        $pago->delete();

        return redirect()->route('admin.fecha_pagos.index')->with('success', 'Fecha de pago eliminada correctamente.');
    }
}
