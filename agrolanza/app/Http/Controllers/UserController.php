<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

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
        if ($request->oper == 'supr')
        {

            $user = User::find($request->id);
            $user->delete();

            $salida = redirect()->route('users.listado');
        }
        else
        {
            
            $validatedData = $request->validate([
                'name'              => 'required|string|max:255',
                'email'             => 'required|string|max:255',
                'password'          => 'required|string|max:255',
                'confirm_password'  => 'required|string|max:255|same:password',

            ], [
                'name.required' => 'El nombre es obligatorio.',
                'name.string'   => 'Debe ser de tipo cadena de texto.',
                'name.max'      => 'Máximo 255 caracteres',

                'email.required' => 'El email es obligatorio.',
                'email.string'   => 'Debe ser de tipo cadena de texto.',
                'email.max'      => 'Máximo 255 caracteres',
                'email.unique'   => 'El email ya existe.',

                'password.required' => 'La contraseña es obligatoria.',
                'password.string'   => 'Debe ser de tipo cadena de texto.',
                'password.max'      => 'Máximo 255 caracteres',

                'confirm_password.required' => 'La confirmación de la contraseña es obligatoria.',
                'confirm_password.string'   => 'Debe ser de tipo cadena de texto.',
                'confirm_password.max'      => 'Máximo 255 caracteres',
                'confirm_password.same'     => 'La confirmación de la contraseña debe coincidir con la contraseña.',
                
            ]);



            $user = empty($request->id)? new User() : User::find($request->id);
            
            $user->name      = $request->name;
            $user->email       = $request->email;
            $user->password = "$request->password";

            $user->save();

            if ($request->has('is_editor'))
            {
                $user->assignRole('editor');
            }
            else
            {
                $user->removeRole('editor');
            }

            $salida = redirect()->route('users.alta')->with([
                    'success'  => 'Usuario insertado correctamente.'
                    ,'formData' => $user
                ]
            );
            
        }

        return $salida;
    }
}