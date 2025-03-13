@extends('layouts.app')
@extends('adminlte::page')


@section('title', 'Alta de cliente')

@section('content')


    @php

        if (session('formData'))
            $cliente = session('formData');

        
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
    
    <form action="{{ route('clientes.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $cliente->id }}" />
        <div class="mb-3">
            <label for="identificacion" class="form-label">Identificación</label>
            <input {{ $disabled }} type="text" name="identificacion" class="form-control" id="identificacion" value="{{ old('identificacion',$cliente->identificacion)}}" placeholder="identificacion">
            @error('identificacion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input {{ $disabled }} type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre',$cliente->nombre)}}" placeholder="Nombre">
            @error('nombre') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input {{ $disabled }} type="text" name="apellidos" class="form-control" id="apellidos" value="{{ old('apellidos',$cliente->apellidos)}}" placeholder="Apellidos">
            @error('apellidos') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input {{ $disabled }}  type="text" name="email" class="form-control" id="email" value="{{ old('email',$cliente->email)}}" placeholder="Correo electrónico">
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input {{ $disabled }}  type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono',$cliente->telefono)}}" placeholder="Teléfono">
            @error('telefono') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="codigo_postal" class="form-label">Código postal</label>
            <input {{ $disabled }}  type="text" name="codigo_postal" class="form-control" id="codigo_postal" value="{{ old('codigo_postal',$cliente->codigo_postal)}}" placeholder="Código postal">
            @error('codigo_postal') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        

      @php

        echo $boton_guardar ;
    
        @endphp

    </form>

@endsection

