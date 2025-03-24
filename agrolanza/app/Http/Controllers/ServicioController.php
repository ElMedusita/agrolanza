<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Parcela;
use App\Models\Servicio;
use App\Models\Cliente;


class ServicioController extends Controller
{
    function listado()
    {
        $servicios = Servicio::with('parcela')->paginate(10);

        $TIPOS_SERVICIO = Servicio::TIPOS_SERVICIO;
        $METODOS_PAGO   = Servicio::METODOS_PAGO;
        $ESTADOS        = Servicio::ESTADOS;

        return view('servicios.servicio', compact('servicios', 'TIPOS_SERVICIO', 'METODOS_PAGO', 'ESTADOS'));
    }

    function formulario($oper='', $id='')
    {
        $servicio = empty($id) ? new Servicio() : Servicio::find($id);
        $parcelas = Parcela::all();

        $TIPOS_SERVICIO = Servicio::TIPOS_SERVICIO;
        $METODOS_PAGO   = Servicio::METODOS_PAGO;
        $ESTADOS        = Servicio::ESTADOS;

        return view('servicios.formulario',compact('TIPOS_SERVICIO', 'METODOS_PAGO', 'ESTADOS','servicio', 'oper', 'parcelas'));

    }
##Falta cambiar variable parcela a servicio
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
                'id_cliente'   => 'required',
                'referencia_catastral' => 'required|max:100',
                'superficie'          => 'required|integer',
                'latitud'    => 'required|numeric',
                'longitud'    => 'required|numeric',
            ], [
                'id_cliente.required' => 'El cliente es obligatorio',

                'referencia_catastral.required' => 'La referencia catastral es obligatoria',
                'referencia_catastral.max'      => 'Máximo 100 caracteres',

                'superficie.required' => 'La superficie es obligatoria',
                'superficie.integer'  => 'La superficie debe ser un número entero',

                'latitud.required' => 'La latitud es obligatoria',
                'latitud.numeric'      => 'La latitud debe ser un número',

                'longitud.required' => 'La longitud es obligatoria',
                'longitud.numeric'      => 'La longitud debe ser un número',
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