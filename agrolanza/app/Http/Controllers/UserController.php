<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

use App\Models\User;


class UserController extends Controller
{
    function listado()
    {
        $users = User::paginate(10);
        

        return view('users.user',compact('users'));
    }


    function formulario($oper='', $id='')
    {
        $user = empty($id)? new User() : User::find($id);
        

        return view('users.formulario',compact('user','oper'));
    }

    function mostrar($id)
    {
        return $this->formulario('cons', $id);
    }

    function actualizar($id)
    {
        return $this->formulario('modi', $id);
    }

    function eliminar($id)
    {
        return $this->formulario('supr', $id);
    }

    function alta()
    {
        return $this->formulario();
    }

    function almacenar(Request $request)
{
    if ($request->oper == 'supr') {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('users.listado');
    }

    // Validaciones
    $rules = [
        'name'  => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
    ];

    if (empty($request->id)) {
        $rules['password'] = 'required';
    } elseif (!empty($request->password)) { // Si se proporciona una nueva contraseña en edición
        $rules['password'] = 'string';
    }

    $validatedData = $request->validate($rules);

    $user = empty($request->id) ? new User() : User::find($request->id);

    $user->name      = $request->name;
    $user->email     = $request->email;

    if (!empty($request->password)) {
        $user->password = bcrypt($request->password);
    }

    $user->identificacion    = $request->identificacion;
    $user->apellidos         = $request->apellidos;
    $user->telefono          = $request->telefono;
    $user->direccion         = $request->direccion;
    $user->localidad         = $request->localidad;
    $user->codigo_postal     = $request->codigo_postal;
    $user->iban              = $request->iban;
    $user->fecha_nacimiento  = $request->fecha_nacimiento;
    $user->fecha_comienzo    = $request->fecha_comienzo;
    $user->fecha_fin         = $request->fecha_fin;

    $user->save();

    // Manejar roles
    /* if ($request->has('is_editor')) {
        $user->assignRole('editor');
    } else {
        $user->removeRole('editor');
    } */

    return redirect()->route('users.alta')->with([
        'success'  => 'Usuario guardado correctamente.',
        'formData' => $user
    ]);
}

}