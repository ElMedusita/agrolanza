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

        $rules = [
            'identificacion' => ['required', 'regex:/^([X-Z])?\d{8}[A-Z]$/', 'unique:users,identificacion,' . $request->id],
            'name'  => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'telefono' => ['required', 'regex:/^\d{9}$/'],
            'direccion' => 'required|string|max:255',
            'localidad' => 'required|string|max:100',
            'codigo_postal' => 'required|regex:/^\d{5}$/',
            'iban' => 'required|regex:/^ES[0-9]{22}$/',
            'fecha_nacimiento' => 'required|date|before:'.now()->subYears(18)->toDateString(),
            'password' => empty($request->id) ? 'required' : (!empty($request->password) ? 'string' : ''),
            'confirm_password' => !empty($request->password) ? 'required|same:password' : '',
        ];

        $validatedData = $request->validate($rules, [
            'identificacion.required' => 'El NIF/NIE es obligatorio.',
            'identificacion.regex' => 'El formato del NIF/NIE no es válido. Debe ser de 8 dígitos seguidos de una letra.',
            'identificacion.unique' => 'Este NIF/NIE ya está registrado.',

            'name.required'  => 'El nombre es obligatorio.',
            'name.string'    => 'Solo se admiten letras',
            'name.max'       => 'Máximo 50 caracteres.',

            'apellidos.required'  => 'El nombre es obligatorio.',
            'apellidos.string'    => 'Solo se admiten letras',
            'apellidos.max'       => 'Máximo 50 caracteres.',
            
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email'    => 'Debe ser un correo válido.',
            'email.max'      => 'Máximo 255 caracteres.',
            'email.unique'   => 'Este correo ya está registrado.',

            'telefono.required'       => 'El teléfono es obligatorio.',
            'telefono.regex'          => 'El teléfono debe tener exactamente 9 dígitos.',
            
            'direccion.required'      => 'La dirección es obligatoria.',
            'direccion.string'        => 'La dirección debe ser una cadena de texto.',
            'direccion.max'           => 'La dirección no puede tener más de 255 caracteres.',
            
            'localidad.required'      => 'La localidad es obligatoria.',
            'localidad.string'        => 'La localidad debe ser una cadena de texto.',
            'localidad.max'           => 'La localidad no puede tener más de 100 caracteres.',
            
            'codigo_postal.required'  => 'El código postal es obligatorio.',
            'codigo_postal.regex'     => 'El código postal debe tener exactamente 5 dígitos.',
            
            'iban.required'           => 'El IBAN es obligatorio.',
            'iban.regex'              => 'El IBAN no tiene un formato válido. Debe comenzar con "ES", seguido de 22 caracteres numéricos.',
            
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date'     => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_nacimiento.before'   => 'La fecha de nacimiento debe ser anterior a 18 años atrás.',
            
            'password.required'        => 'La contraseña es obligatoria para nuevos usuarios.',
            'password.string'          => 'La contraseña debe ser una cadena de texto.',
            
            'confirm_password.required' => 'La confirmación de la contraseña es obligatoria.',
            'confirm_password.same'    => 'La confirmación de la contraseña debe coincidir con la contraseña.',
        ]);

        $user = empty($request->id) ? new User() : User::find($request->id);

        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->identificacion   = $request->identificacion;
        $user->apellidos        = $request->apellidos;
        $user->telefono         = $request->telefono;
        $user->direccion        = $request->direccion;
        $user->localidad        = $request->localidad;
        $user->codigo_postal    = $request->codigo_postal;
        $user->iban             = $request->iban;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->fecha_comienzo   = $request->fecha_comienzo;
        $user->fecha_fin        = $request->fecha_fin;
        $user->ip_alta          = $request->ip();

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $roles = ['auxiliar', 'conductor', 'aplicador'];
        foreach ($roles as $role) {
            $request->has("is_$role") ? $user->assignRole($role) : $user->removeRole($role);
        }

        return redirect()->route('users.alta')->with([
            'success'  => 'Empleado guardado correctamente.',
            'formData' => $user
        ]);
    }

}