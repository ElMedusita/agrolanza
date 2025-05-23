<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maquinaria;

class MaquinariaController extends Controller
{
    function listado()
    {
        $maquinarias = Maquinaria::paginate(10);

        return view('maquinarias.maquinaria',compact('maquinarias'));
    }

    function formulario($oper='', $id='')
    {
        $maquinaria = empty($id)? new Maquinaria() : Maquinaria::find($id);

        return view('maquinarias.formulario',compact('maquinaria','oper'));
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

            $maquinaria = Maquinaria::find($request->id);
            $maquinaria->delete();

            $salida = redirect()->route('maquinarias.listado');
        }
        else
        {
            $validatedData = $request->validate([
                'numero_serie'   => 'required|regex:/^[A-Za-z0-9]{15}$/',
                'matricula'      => 'required|regex:/^[A-Za-z0-9]{8}$/',
                'marca'          => 'required|max:20',
                'descripcion'    => 'required|max:200'
            ], [
                'numero_serie.required' => 'El número de serie es obligatorio.',
                'numero_serie.regex'    => 'El formato es de 15 valores alfanuméricos.',

                'matricula.required' => 'El autor es obligatorio.',
                'matricula.regex'    => 'El formato es de 8 valores alfanuméricos.',

                'marca.required' => 'La marca es obligatoria.',
                'marca.max'      => 'Máximo 20 caracteres.',

                'descripcion.required' => 'Se require de información acerca de la maquinaria.',
                'descripcion.max'      => 'Máximo 200 caracteres.',
            ]);

            $maquinaria = empty($request->id)? new Maquinaria() : Maquinaria::find($request->id);

            $maquinaria->numero_serie = $request->numero_serie;
            $maquinaria->matricula    = $request->matricula;
            $maquinaria->marca        = $request->marca;
            $maquinaria->descripcion  = $request->descripcion;
            $maquinaria->ip_alta = $request->ip();

            $maquinaria->save();

            $salida = redirect()->route('maquinarias.alta')->with([
                    'success'  => 'Maquinaria insertada correctamente.'
                    ,'formData' => $maquinaria
                ]
            );
        }

        return $salida;
    }
}