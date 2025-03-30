<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\User;
use App\Models\Fitosanitario;
use App\Models\Maquinaria;

class GestionServicioController extends Controller
{
    public function index($id)
    {
        $servicio = Servicio::with('users')->findOrFail($id);
        $users_disponibles = User::whereNotIn('id', $servicio->users->pluck('id'))->get();
        $fitosanitarios_disponibles = Fitosanitario::whereNotIn('id', $servicio->fitosanitarios->pluck('id'))->get();
        $maquinarias_disponibles = Maquinaria::whereNotIn('id', $servicio->maquinarias->pluck('id'))->get();

        return view('servicios.opciones.user', compact('servicio', 'users_disponibles', 'fitosanitarios_disponibles', 'maquinarias_disponibles'));
    }

    #Empleados
    public function store_user(Request $request, $id_servicio)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
        ]);

        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->users()->attach($request->id_user);

        return redirect()->back()->with('success', 'Usuario agregado al servicio correctamente.');
    }

    public function destroy_user($id_servicio, $id_user)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->users()->detach($id_user);

        return redirect()->back()->with('success', 'Usuario eliminado del servicio correctamente.');
    }

    #Fitosanitarios
    public function store_fitosanitario(Request $request, $id_servicio)
    {
        $request->validate([
            'id_fitosanitario' => 'required|exists:fitosanitarios,id',
        ]);

        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->fitosanitarios()->attach($request->id_fitosanitario);

        return redirect()->back()->with('success', 'Fitosanitario agregado al servicio correctamente.');
    }

    public function destroy_fitosanitario($id_servicio, $id_fitosanitario)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->fitosanitarios()->detach($id_fitosanitario);

        return redirect()->back()->with('success', 'Fitosanitario eliminado del servicio correctamente.');
    }

    #Maquinarias
    public function store_maquinaria(Request $request, $id_servicio)
    {
        $request->validate([
            'id_maquinaria' => 'required|exists:maquinarias,id',
        ]);

        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->maquinarias()->attach($request->id_maquinaria);

        return redirect()->back()->with('success', 'Maquinaria agregada al servicio correctamente.');
    }

    public function destroy_maquinaria($id_servicio, $id_maquinaria)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->maquinarias()->detach($id_maquinaria);

        return redirect()->back()->with('success', 'Maquinaria eliminada del servicio correctamente.');
    }
}
