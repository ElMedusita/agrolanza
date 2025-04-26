<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Parcela;
use App\Models\Cliente;

class ParcelaController extends Controller
{
    function listado()
    {
        $parcelas = Parcela::with('cliente')->paginate(10);

        return view('parcelas.parcela', compact('parcelas'));
    }

    function formulario($oper='', $id='')
    {
        $parcela = empty($id) ? new Parcela() : Parcela::find($id);
        $clientes = Cliente::all();

        return view('parcelas.formulario', compact('parcela', 'oper', 'clientes'));
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

            $parcela = Parcela::find($request->id);
            $parcela->delete();

            $salida = redirect()->route('parcelas.listado');
        }
        else
        {
            $validatedData = $request->validate([
                'id_cliente' => 'required',
                'referencia_catastral' => ['required', 'regex:/^[A-Za-z0-9]{20}$/'],
                'superficie' => 'required|integer|max:10000000',
                'latitud'    => 'required|numeric',
                'longitud'   => 'required|numeric',
            ], [
                'id_cliente.required' => 'El cliente es obligatorio.',

                'referencia_catastral.required' => 'La referencia catastral es obligatoria.',
                'referencia_catastral.regex'    => 'El formato es de 20 valores alfanuméricos.',

                'superficie.required' => 'La superficie es obligatoria.',
                'superficie.integer'  => 'La superficie debe ser un número entero.',
                'superficie.max'      => 'El límite es de 10000000 m².',

                'latitud.required' => 'La latitud es obligatoria.',
                'latitud.numeric'  => 'La latitud debe ser un número.',

                'longitud.required' => 'La longitud es obligatoria.',
                'longitud.numeric'  => 'La longitud debe ser un número.',
            ]);

            $parcela = empty($request->id)? new Parcela() : Parcela::find($request->id);

            $parcela->id_cliente = $request->id_cliente;
            $parcela->referencia_catastral    = $request->referencia_catastral;
            $parcela->superficie        = $request->superficie;
            $parcela->latitud  = $request->latitud;
            $parcela->longitud  = $request->longitud;
            $parcela->ip_alta = $request->ip();

            $parcela->save();

            $salida = redirect()->route('parcelas.alta')->with([
                    'success'  => 'Parcela insertada correctamente.'
                    ,'formData' => $parcela
                ]
            );
        }

        return $salida;
    }
}