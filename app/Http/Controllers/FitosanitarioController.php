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
                'nombre'         => 'required|max:20',
                'marca'          => 'required|max:20',
                'numero_registro' => 'required|max:14',
                'tipo'         => 'required|in:'.$validacion_tipo,
                'estado'       => 'required|in:'.$validacion_estado,
                'descripcion'    => 'required|max:200',
                'entidad_vendedora' => 'required|max:40',
                'materia_activa' => 'required|max:30',
                'cantidad_materia_activa' => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
                'dosis_maxima' => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
                'plazo_seguridad' => 'required|integer|max:1000',
                'observaciones' => 'nullable|max:200',
            ], [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.max'      => 'Máximo 20 caracteres',

                'marca.required' => 'La marca es obligatoria.',
                'marca.max'      => 'Máximo 20 caracteres',

                'numero_registro.required' => 'El número de registro es obligatorio.',
                'numero_registro.max'      => 'No debe exceder 14 caracteres',

                'tipo.required'      => 'El tipo es obligatorio.',

                'estado.required'    => 'El estado es obligatorio.',

                'descripcion.required' => 'La descripción es obligatoria.',
                'descripcion.max' => 'La descripción no debe exceder los 200 caracteres.',
                
                'entidad_vendedora.required' => 'La entidad vendedora es obligatoria.',
                'entidad_vendedora.max' => 'La entidad vendedora no debe exceder los 40 caracteres.',
                
                'materia_activa.required' => 'La materia activa es obligatoria.',
                'materia_activa.max' => 'La materia activa no debe exceder los 30 caracteres.',
                
                'cantidad_materia_activa.required' => 'La cantidad de materia activa es obligatoria.',
                'cantidad_materia_activa.numeric' => 'La cantidad de materia activa debe ser un valor numérico.',
                'cantidad_materia_activa.regex' => 'La cantidad de materia activa debe ser un número entero o decimal con hasta 2 decimales.',
                
                'dosis_maxima.required' => 'La dosis máxima es obligatoria.',
                'dosis_maxima.numeric' => 'La dosis máxima debe ser un valor numérico.',
                'dosis_maxima.regex' => 'La dosis máxima debe ser un número entero o decimal con hasta 2 decimales.',
                
                'plazo_seguridad.required' => 'El plazo de seguridad es obligatorio.',
                'plazo_seguridad.integer' => 'El plazo de seguridad debe ser un número entero.',
                'plazo_seguridad.max' => 'El plazo de seguridad no debe exceder los 1000 días.',
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
