<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;


class ServicioUserController extends Controller
{
    public function index($id)
    {
        $servicio = Servicio::with('users')->findOrFail($id);
        return view('servicios.users.user', compact('servicio'));
    }
}
