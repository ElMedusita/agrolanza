@extends('layouts.app')
@extends('adminlte::page')


@section('title', 'Alta de usuario')

@section('content')


    @php

        if (session('formData'))
            $user = session('formData');

        
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
    
    <form action="{{ route('users.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
        <div class="mb-3">
            <label for="identificacion" class="form-label">Identificación</label>
            <input {{ $disabled }} type="text" name="identificacion" class="form-control" id="identificacion" value="{{ old('identificacion',$user->identificacion)}}" placeholder="Identificación">
            @error('identificacion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input {{ $disabled }} type="text" name="name" class="form-control" id="name" value="{{ old('name',$user->name)}}" placeholder="Nombre">
            @error('name') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input {{ $disabled }} type="text" name="apellidos" class="form-control" id="apellidos" value="{{ old('apellidos',$user->apellidos)}}" placeholder="Apellidos">
            @error('apellidos') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input {{ $disabled }}  type="text" name="email" class="form-control" id="email" value="{{ old('email',$user->email)}}" placeholder="Email">
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input {{ $disabled }}  type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono',$user->telefono)}}" placeholder="Teléfono">
            @error('telefono') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input {{ $disabled }}  type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion',$user->direccion)}}" placeholder="Dirección">
            @error('direccion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="localidad" class="form-label">Localidad</label>
            <input {{ $disabled }}  type="text" name="localidad" class="form-control" id="localidad" value="{{ old('localidad',$user->localidad)}}" placeholder="Localidad">
            @error('localidad') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="codigo_postal" class="form-label">Código postal</label>
            <input {{ $disabled }}  type="text" name="codigo_postal" class="form-control" id="codigo_postal" value="{{ old('codigo_postal',$user->codigo_postal)}}" placeholder="Código postal">
            @error('codigo_postal') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="iban" class="form-label">IBAN</label>
            <input {{ $disabled }}  type="text" name="iban" class="form-control" id="iban" value="{{ old('iban',$user->iban)}}" placeholder="IBAN">
            @error('iban') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
            <input {{ $disabled }}  type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="{{ old('fecha_nacimiento',$user->fecha_nacimiento)}}" placeholder="Fecha nacimiento">
            @error('fecha_nacimiento') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_comienzo" class="form-label">Fecha comienzo</label>
            <input {{ $disabled }}  type="date" name="fecha_comienzo" class="form-control" id="fecha_comienzo" value="{{ old('fecha_comienzo',$user->fecha_comienzo)}}" placeholder="Fecha comienzo">
            @error('fecha_comienzo') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha fin</label>
            <input {{ $disabled }}  type="date" name="fecha_fin" class="form-control" id="fecha_fin" value="{{ old('fecha_fin',$user->fecha_fin)}}" placeholder="Fecha fin">
            @error('fecha_fin') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        @if ($oper != 'cons' && $oper != 'supr' && $oper != 'modi')
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input {{ $disabled }}  type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
            @error('password') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmar contraseña</label>
            <input {{ $disabled }} type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirmar contraseña">
            @error('confirm_password') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        @endif


      @php

        echo $boton_guardar ;
    
        @endphp

    </form>

@endsection

