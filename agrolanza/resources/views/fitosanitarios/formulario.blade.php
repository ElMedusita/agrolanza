@extends('layouts.app')
@extends('adminlte::page')


@section('title', 'Alta de producto fitosanitario')

@section('content')


    @php

        if (session('formData'))
            $fitosanitario = session('formData');

        
        $disabled = '';
        $boton_guardar = '<button type="submit" class="btn btn-primary">Guardar</button>';
        if (session('formData') || $oper == 'cons' || $oper == 'supr')
        {
            $disabled = 'disabled';

            if ($oper == 'supr')
                $boton_guardar = '<button type="submit" class="btn btn-danger">Eliminar</button>';
            else
                $boton_guardar = '';
        }
            
    @endphp

    <br />
    @if(session('success'))
        <p style="text-align:center;" class="alert alert-success">{{ session('success') }}</p>
    @endif
    
    <form action="{{ route('fitosanitarios.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $fitosanitario->id }}" />
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input {{ $disabled }} type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre',$fitosanitario->nombre)}}" placeholder="Nombre">
            @error('nombre') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input {{ $disabled }} type="text" name="marca" class="form-control" id="marca" value="{{ old('marca',$fitosanitario->marca)}}" placeholder="Marca">
            @error('marca') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="numero_registro" class="form-label">Número de registro</label>
            <input {{ $disabled }} type="text" name="numero_registro" class="form-control" id="numero_registro" value="{{ old('numero_registro',$fitosanitario->numero_registro)}}" placeholder="Número de registro">
            @error('numero_registro') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select {{ $disabled }}  name="tipo" id="tipo" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">Selecciona un tipo...</option>
                @foreach ($TIPOS as $clave_tipo => $texto_tipo)
        
                    @php
                        $selected = old('tipo') == $clave_tipo || $fitosanitario->tipo == $clave_tipo ? 'selected="selected"' : '';
                    @endphp

                    <option value="{{ $clave_tipo }}" {{ $selected }}>{{ $texto_tipo }}</option>

                @endforeach
            </select>
            @error('tipo') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select {{ $disabled }}  name="estado" id="estado" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">Selecciona un estado...</option>
                @foreach ($ESTADOS as $clave_estado => $texto_estado)
        
                    @php
                        $selected = old('estado') == $clave_estado || $fitosanitario->estado == $clave_estado ? 'selected="selected"' : '';
                    @endphp

                    <option value="{{ $clave_estado }}" {{ $selected }}>{{ $texto_estado }}</option>

                @endforeach
            </select>
            @error('estado') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input {{ $disabled }}  type="text" name="descripcion" class="form-control" id="descripcion" value="{{ old('descripcion',$fitosanitario->descripcion)}}" placeholder="Descripción">
            @error('descripcion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="entidad_vendedora" class="form-label">Entidad vendedora</label>
            <input {{ $disabled }}  type="text" name="entidad_vendedora" class="form-control" id="entidad_vendedora" value="{{ old('entidad_vendedora',$fitosanitario->entidad_vendedora)}}" placeholder="Entidad vendedora">
            @error('entidad_vendedora') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="materia_activa" class="form-label">Materia activa</label>
            <input {{ $disabled }}  type="text" name="materia_activa" class="form-control" id="materia_activa" value="{{ old('materia_activa',$fitosanitario->materia_activa)}}" placeholder="Materia activa">
            @error('materia_activa') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="cantidad_materia_activa" class="form-label">Cantidad de materia activa</label>
            <input {{ $disabled }} type="number" step="0.01" name="cantidad_materia_activa" class="form-control" id="cantidad_materia_activa" value="{{ old('cantidad_materia_activa', $fitosanitario->cantidad_materia_activa) }}" placeholder="Cantidad de materia activa">
            @error('cantidad_materia_activa') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="dosis_maxima" class="form-label">Dosis máxima por litro</label>
            <input {{ $disabled }} type="number" step="0.01" name="dosis_maxima" class="form-control" id="dosis_maxima" value="{{ old('dosis_maxima', $fitosanitario->dosis_maxima) }}" placeholder="Dosis máxima por litro">
            @error('dosis_maxima') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="plazo_seguridad" class="form-label">Plazo de seguridad</label>
            <input {{ $disabled }} type="number" step="1" name="plazo_seguridad" class="form-control" id="plazo_seguridad" value="{{ old('plazo_seguridad', $fitosanitario->plazo_seguridad) }}" placeholder="Plazo de seguridad">
            @error('plazo_seguridad') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input {{ $disabled }} type="text" name="observaciones" class="form-control" id="observaciones" value="{{ old('observaciones', $fitosanitario->observaciones) }}" placeholder="Observaciones">
            @error('observaciones') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        
        @php

        echo $boton_guardar ;
        
        @endphp

    </form>

@endsection

