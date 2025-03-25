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

            $validacion_estado = '';
            foreach(Servicio::ESTADOS as $codigo_estado => $texto_estado)
            {
                $validacion_estado .= $codigo_estado .',';
            }
            $validacion_estado = substr($validacion_estado,0,-1);

            $validatedData = $request->validate([
                'id_parcela'   => 'required',
                'tipo_servicio' => 'required|in:'.$validacion_tipo_servicio,
                'descripcion'   => 'required|max:100',
                'fecha_servicio'    => 'required|date',
                'hora_servicio'    => 'required',
                'duracion'    => 'required|integer',
                'presupuesto'    => 'required|numeric',
                'metodo_pago'    => 'required|in:'.$validacion_metodo_pago,
            ], [
                'id_parcela.required' => 'La parcela es obligatoria',

                'tipo_servicio.required' => 'El tipo de servicio es obligatorio',

                'descripcion.required' => 'Una descripción es obligatoria',
                'descripcion.max'  => 'Se soporta un máximo de 100 caracteres',

                'fecha_servicio.required' => 'La fecha del servicio es obligatoria',
                'fecha_servicio.date' => 'La fecha del servicio debe ser una fecha válida',

                'hora_servicio.required' => 'La hora del servicio es obligatoria',

                'duracion.required' => 'La duración del servicio es obligatoria',
                'duracion.integer' => 'La duración del servicio debe ser un número',

                'presupuesto.required' => 'El presupuesto es obligatorio',
                'presupuesto.numeric' => 'El presupuesto debe ser un número',

                'metodo_pago.required' => 'El método de pago es obligatorio',
            ]);

            $servicio = empty($request->id)? new Servicio() : Servicio::find($request->id);

            $servicio->id_parcela     = $request->id_parcela;
            $servicio->tipo_servicio  = $request->tipo_servicio;
            $servicio->descripcion    = $request->descripcion;
            $servicio->fecha_servicio = $request->fecha_servicio;
            $servicio->hora_servicio  = $request->hora_servicio;
            $servicio->duracion       = $request->duracion;
            $servicio->presupuesto    = $request->presupuesto;
            $servicio->metodo_pago    = $request->metodo_pago;
            $servicio->estado         = $request->estado;
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