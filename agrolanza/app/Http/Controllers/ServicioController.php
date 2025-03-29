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

            $servicio = Servicio::find($request->id);
            $servicio->delete();

            $salida = redirect()->route('servicios.listado');
        }
        else
        {
            $validacion_tipo_servicio = '';
            foreach(Servicio::TIPOS_SERVICIO as $codigo_tipo_servicio => $texto_tipo_servicio)
            {
                $validacion_tipo_servicio .= $codigo_tipo_servicio .',';
            }
            $validacion_tipo_servicio = substr($validacion_tipo_servicio,0,-1);


            $validacion_metodo_pago = '';
            foreach(Servicio::METODOS_PAGO as $codigo_metodo_pago => $texto_metodo_pago)
            {
                $validacion_metodo_pago .= $codigo_metodo_pago .',';
            }
            $validacion_metodo_pago = substr($validacion_metodo_pago,0,-1);


            $validacion_estado = '';
            foreach(Servicio::ESTADOS as $codigo_estado => $texto_estado)
            {
                $validacion_estado .= $codigo_estado .',';
            }
            $validacion_estado = substr($validacion_estado,0,-1);

            $validatedData = $request->validate([
                'tipo_servicio' => 'required|in:'.$validacion_tipo_servicio,
                'descripcion'   => 'required|string|max:255',
                'fecha_servicio'=> 'required|date',
                'hora_servicio' => 'required',
                'duracion'      => 'required|integer',
                'presupuesto'   => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
                'metodo_pago'   => 'required|in:'.$validacion_metodo_pago,
                'estado'        => 'required|in:'.$validacion_estado,
                
                'id_parcela'    => 'required|exists:parcelas,id',
            ], [
                'tipo_servicio.required' => 'El tipo de servicio es obligatorio.',

                'descripcion.required' => 'La descripción es obligatoria.',
                'descripcion.string' => 'Debe ser de tipo cadena de texto.',
                'descripcion.max'    => 'Máximo 255 caracteres',

                'fecha_servicio.required' => 'La fecha es obligatoria.',
                'fecha_servicio.date'     => 'Debe ser de tipo fecha.',

                'hora_servicio.required' => 'La hora es obligatoria.',

                'duracion.required' => 'La duración es obligatoria.',
                'duracion.integer'  => 'Debe ser de tipo numérico entero.',

                'presupuesto.required' => 'El importe es obligatorio.',
                'presupuesto.numeric'  => 'Debe ser de tipo numérico.',
                'presupuesto.regex'    => 'El formato admitido es un numero entero de maximo 5 digitos con decimales opcionales 1 o 2 como máximo',

                'metodo_pago.required' => 'El método de pago es obligatorio.',

                'estado.required' => 'El estado es obligatorio.',

                'id_parcela.required' => 'La parcela es obligatoria.',
                'id_parcela.exists'   => 'La parcela seleccionada no existe.',
            ]);

            $servicio = empty($request->id)? new Servicio() : Servicio::find($request->id);

            $servicio->tipo_servicio  = $request->tipo_servicio;
            $servicio->descripcion    = $request->descripcion;
            $servicio->fecha_servicio = $request->fecha_servicio;
            $servicio->hora_servicio  = $request->hora_servicio;
            $servicio->duracion       = $request->duracion;
            $servicio->presupuesto    = $request->presupuesto;
            $servicio->metodo_pago    = $request->metodo_pago;
            $servicio->estado         = $request->estado;
            $servicio->id_parcela     = $request->id_parcela;
            $servicio->ip_alta        = $request->ip();

            $servicio->save();

            $salida = redirect()->route('servicios.alta')->with([
                    'success'  => 'Servicio insertado correctamente.'
                    ,'formData' => $servicio
                ]
            );
        }

        return $salida;
    }
}