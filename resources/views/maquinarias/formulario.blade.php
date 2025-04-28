@extends('layouts.app')
@extends('adminlte::page')


@section('title', 'Alta de maquinaria')

@section('content')

    <br>
    <p><a href="{{ url('/maquinarias') }}" class="btn btn-secondary">Volver</a></p>

    <h2>Gestión de maquinaria</h2>

    @php

        if (session('formData'))
            $maquinaria = session('formData');

        
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
    
    <form action="{{ route('maquinarias.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $maquinaria->id }}" />
        <div class="mb-3">
            <label for="numero_serie" class="form-label">Número de serie *</label>
            <input {{ $disabled }} type="text" name="numero_serie" class="form-control" id="numero_serie" value="{{ old('numero_serie',$maquinaria->numero_serie)}}" placeholder="Número de serie">
            @error('numero_serie') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula *</label>
            <input {{ $disabled }} type="text" name="matricula" class="form-control" id="matricula" value="{{ old('matricula',$maquinaria->matricula)}}" placeholder="Matrícula">
            @error('matricula') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca *</label>
            <input {{ $disabled }} type="text" name="marca" class="form-control" id="marca" value="{{ old('marca',$maquinaria->marca)}}" placeholder="Marca">
            @error('marca') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción *</label>
            <input {{ $disabled }}  type="text" name="descripcion" class="form-control" id="descripcion" value="{{ old('descripcion',$maquinaria->descripcion)}}" placeholder="Descripción">
            @error('descripcion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        

        @php

        echo $boton_guardar ;
    
        @endphp

    </form>
    <br>

@endsection

