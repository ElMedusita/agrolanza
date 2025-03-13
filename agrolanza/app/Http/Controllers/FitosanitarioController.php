<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fitosanitario;

class FitosanitarioController extends Controller
{
    function listado()
    {
        $fitosanitarios = Fitosanitario::paginate(10);

        $TIPOS     = Fitosanitario::TIPOS;
        $ESTADOS   = Fitosanitario::ESTADOS;

        return view('fitosanitarios.fitosanitario',compact('fitosanitarios','TIPOS', 'ESTADOS'));
    }

    function formulario($oper='', $id='')
    {
        $fitosanitario = empty($id)? new Fitosanitario() : Fitosanitario::find($id);
        
        $TIPOS      = Fitosanitario::TIPOS;
        $ESTADOS    = Fitosanitario::ESTADOS;

        return view('fitosanitarios.formulario',compact('TIPOS', 'ESTADOS','fitosanitario','oper'));
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

            $fitosanitario = Fitosanitario::find($request->id);
            $fitosanitario->delete();

            $salida = redirect()->route('fitosanitarios.listado');
        }
        else
        {
            $validacion_tipo = '';
            foreach(Fitosanitario::TIPOS as $codigo_tipo => $texto_tipo)
            {
                $validacion_tipo .= $codigo_tipo .',';
            }

            $validacion_tipo = substr($validacion_tipo,0,-1);

            $validacion_estado = '';
            foreach(Fitosanitario::ESTADOS as $codigo_estado => $texto_estado)
            {
                $validacion_estado .= $codigo_estado .',';
            }

            $validacion_estado = substr($validacion_estado,0,-1);
            
            $validatedData = $request->validate([
                'nombre'         => 'required|string|max:255',
                'marca'          => 'required|string|max:255',
                'numero_registro' => 'required|string|max:255',
                'tipo'         => 'required|in:'.$validacion_tipo,
                'estado'       => 'required|in:'.$validacion_estado,
                'descripcion'    => 'required|string|max:255',
                'entidad_vendedora' => 'required|string|max:255',
                'materia_activa' => 'required|string|max:255',
                'cantidad_materia_activa' => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
                'dosis_maxima' => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
                'plazo_seguridad' => 'required|integer',
                'observaciones' => 'nullable|string|max:255',
            ], [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.string'   => 'Debe ser de tipo cadena de texto.',
                'nombre.max'      => 'Máximo 255 caracteres',

                'marca.required' => 'La marca es obligatoria.',
                'marca.string'   => 'Debe ser de tipo cadena de texto.',
                'marca.max'      => 'Máximo 255 caracteres',

                'numero_registro.required' => 'El número de registro es obligatorio.',
                'numero_registro.string'   => 'Debe ser de tipo cadena de texto.',
                'numero_registro.max'      => 'Máximo 255 caracteres',

                'tipo.required'      => 'El tipo es obligatorio.',

                'estado.required'    => 'El estado es obligatorio.',

                'descripcion.required'   => 'La descripción es obligatoria.',
                'descripcion.string'     => 'Debe ser de tipo cadena de texto.',
                'descripcion.max'        => 'Máximo 255 caracteres',

                'entidad_vendedora.required' => 'El nombre de la entidad vendedora del producto es obligatorio.',
                'entidad_vendedora.string'   => 'Debe ser de tipo cadena de texto.',
                'entidad_vendedora.max'      => 'Máximo 255 caracteres',

                'materia_activa.required' => 'La materia activa es obligatoria.',
                'materia_activa.string'   => 'Debe ser de tipo cadena de texto.',
                'materia_activa.max'      => 'Máximo 255 caracteres',

                'cantidad_materia_activa.required' => 'La cantidad de materia activa es obligatoria.',
                'cantidad_materia_activa.numeric'  => 'Debe ser de tipo numérico.',
                'cantidad_materia_activa.regex'    => 'El formato admitido es un numero entero de maximo 5 digitos con decimales opcionales 1 o 2 como máximo',

                'dosis_maxima.required' => 'La dosis máxima es obligatoria.',
                'dosis_maxima.numeric'  => 'Debe ser de tipo numérico.',
                'dosis_maxima.regex'    => 'El formato admitido es un numero entero de maximo 5 digitos con decimales opcionales 1 o 2 como máximo',

                'plazo_seguridad.required' => ' El plazo de seguridad es obligatorio.',
                'plazo_seguridad.integer'  => 'Debe ser de tipo numérico entero.',

                'observaciones.string'   => 'Debe ser de tipo cadena de texto.',
                'observaciones.max'      => 'Máximo 255 caracteres',
            ]);

            $fitosanitario = empty($request->id)? new Fitosanitario() : Fitosanitario::find($request->id);

            $fitosanitario->nombre            = $request->nombre;
            $fitosanitario->marca             = $request->marca;
            $fitosanitario->numero_registro   = $request->numero_registro;
            $fitosanitario->tipo              = $request->tipo;
            $fitosanitario->estado            = $request->estado;
            $fitosanitario->descripcion       = $request->descripcion;
            $fitosanitario->entidad_vendedora = $request->entidad_vendedora;
            $fitosanitario->materia_activa    = $request->materia_activa;
            $fitosanitario->cantidad_materia_activa = $request->cantidad_materia_activa;
            $fitosanitario->dosis_maxima      = $request->dosis_maxima;
            $fitosanitario->plazo_seguridad   = $request->plazo_seguridad;
            $fitosanitario->observaciones     = $request->observaciones;
            $fitosanitario->ip_alta = $request->ip();




            $fitosanitario->save();

            $salida = redirect()->route('fitosanitarios.alta')->with([
                    'success'  => 'Fitosanitario insertado correctamente.'
                    ,'formData' => $fitosanitario
                ]
            );
        }

        return $salida;
    }
}
