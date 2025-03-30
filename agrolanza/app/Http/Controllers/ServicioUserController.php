<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\User;
use App\Models\Fitosanitario;


class ServicioUserController extends Controller
{
    public function index($id)
    {
        $servicio = Servicio::with('users')->findOrFail($id);
        $users_disponibles = User::whereNotIn('id', $servicio->users->pluck('id'))->get();
        $fitosanitarios_disponibles = Fitosanitario::whereNotIn('id', $servicio->fitosanitarios->pluck('id'))->get();

        return view('servicios.opciones.user', compact('servicio', 'users_disponibles', 'fitosanitarios_disponibles'));
    }

    public function store(Request $request, $id_servicio)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
        ]);

        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->users()->attach($request->id_user);

        return redirect()->back()->with('success', 'Usuario agregado al servicio correctamente.');
    }

    public function destroy($id_servicio, $id_user)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->users()->detach($id_user);

        return redirect()->back()->with('success', 'Usuario eliminado del servicio correctamente.');
    }
}
