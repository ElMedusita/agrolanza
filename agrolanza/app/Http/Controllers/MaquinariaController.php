<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maquinaria;
use App\Models\User;
use App\Models\Role;

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
                'numero_serie'   => 'required|max:100',
                'matricula'      => 'required|max:100',
                'marca'          => 'required|max:100',
                'descripcion'    => 'required|max:255'
            ], [
                'numero_serie.required' => 'El número de serie es obligatorio.',
                'numero_serie.max'      => 'Máximo 100 caracteres',

                'matricula.required' => 'El autor es obligatorio.',
                'matricula.max'      => 'Máximo 100 caracteres',

                'marca.required' => 'La marca es obligatoria.',
                'marca.max'      => 'Máximo 100 caracteres',

                'descripcion.required' => 'La descripción es obligatoria.',
                'descripcion.max'      => 'Máximo 255 caracteres',
            ]);

            $maquinaria = empty($request->id)? new Maquinaria() : Maquinaria::find($request->id);

            $maquinaria->numero_serie = $request->numero_serie;
            $maquinaria->matricula    = $request->matricula;
            $maquinaria->marca        = $request->marca;
            $maquinaria->descripcion  = $request->descripcion;

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