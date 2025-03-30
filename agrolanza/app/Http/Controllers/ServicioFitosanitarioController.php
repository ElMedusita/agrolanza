<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Fitosanitario;


class ServicioFitosanitarioController extends Controller
{

    
    public function store(Request $request, $id_servicio)
    {
        $request->validate([
            'id_fitosanitario' => 'required|exists:fitosanitarios,id',
        ]);

        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->fitosanitarios()->attach($request->id_fitosanitario);

        return redirect()->back()->with('success', 'Fitosanitario agregado al servicio correctamente.');
    }

    public function destroy($id_servicio, $id_fitosanitario)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->fitosanitarios()->detach($id_fitosanitario);

        return redirect()->back()->with('success', 'Fitosanitario eliminado del servicio correctamente.');
    }
}
