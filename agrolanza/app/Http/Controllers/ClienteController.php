<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{
    function listado()
    {
        $clientes = Cliente::paginate(10);

        return view('clientes.cliente',compact('clientes'));
    }

    function formulario($oper='', $id='')
    {
        $cliente = empty($id)? new Cliente() : Cliente::find($id);

        return view('clientes.formulario',compact('cliente','oper'));
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

            $cliente = Cliente::find($request->id);
            $cliente->delete();

            $salida = redirect()->route('clientes.listado');
        }
        else
        {   
            $validatedData = $request->validate([
                'identificacion' => ['required', 'regex:/^([X-Z])?\d{8}[A-Z]$/', 'unique:clientes,identificacion,' . $request->id],
                'nombre'         => 'required|string|max:50',
                'apellidos'      => 'required|string|max:50',
                'email'          => 'nullable|string|email|max:255|unique:users,email,' . $request->id,
                'telefono'       => 'required|string|size:9|regex:/[0-9]{9}/',
                'codigo_postal'  => 'required|regex:/^\d{5}$/',

            ], [
                'identificacion.required' => 'El NIF/NIE es obligatorio.',
                'identificacion.regex' => 'El formato del NIF/NIE no es válido. Debe ser de 8 dígitos seguidos de una letra.',
                'identificacion.unique' => 'Este NIF/NIE ya está registrado.',
    
                'nombre.required'  => 'El nombre es obligatorio.',
                'nombre.string'    => 'Solo se admiten letras',
                'nombre.max'       => 'Máximo 50 caracteres.',
    
                'apellidos.required'  => 'El nombre es obligatorio.',
                'apellidos.string'    => 'Solo se admiten letras',
                'apellidos.max'       => 'Máximo 50 caracteres.',
                
                'email.email'    => 'Debe ser un correo válido.',
                'email.max'      => 'Máximo 255 caracteres.',
                'email.unique'   => 'Este correo ya está registrado.',
    
                'telefono.required'       => 'El teléfono es obligatorio.',
                'telefono.regex'          => 'El teléfono debe tener exactamente 9 dígitos.',
                

                'codigo_postal.required'  => 'El código postal es obligatorio.',
                'codigo_postal.regex'     => 'El código postal debe tener exactamente 5 dígitos.',    
            ]);

            $cliente = empty($request->id)? new Cliente() : Cliente::find($request->id);

            $cliente->identificacion = $request->identificacion;
            $cliente->nombre         = $request->nombre;
            $cliente->apellidos      = $request->apellidos;
            $cliente->email          = $request->email;
            $cliente->telefono       = $request->telefono;
            $cliente->codigo_postal  = $request->codigo_postal;
            $cliente->ip_alta        = $request->ip();
            $cliente->save();

            $salida = redirect()->route('clientes.alta')->with([
                    'success'  => 'Cliente insertado correctamente.'
                    ,'formData' => $cliente
                ]
            );
        }

        return $salida;
    }
}