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
                'identificacion' => 'required|max:100',
                'nombre'         => 'required|max:100',
                'apellidos'      => 'required|max:100',
                'email'          => 'nullable|max:255',
                'telefono'       => 'required|string|size:9|regex:/[0-9]{9}/',
                'codigo_postal'  => 'required|string|size:5|regex:/[0-9]{5}/',

            ], [
                'identificacion.required' => 'La identificación del cliente es obligatoria.',
                'identificacion.max'      => 'Máximo 100 caracteres',

                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.max'      => 'Máximo 100 caracteres',

                'apellidos.required' => 'Los apellidos son obligatorios.',
                'apellidos.max'      => 'Máximo 100 caracteres',

                'email.max'      => 'Máximo 255 caracteres',

                'telefono.required' => 'Es obligatorio almacenar un teléfono de contacto.',
                'telefono.max'      => 'Máximo 9 caracteres',
                'telefono.integer'  => 'El teléfono debe ser un número entero.',


                'codigo_postal.required' => 'El código postal es obligatorio.',
                'codigo_postal.integer'  => 'El código postal debe ser un número entero.',
                'codigo_postal.max'      => 'Máximo 5 caracteres',
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