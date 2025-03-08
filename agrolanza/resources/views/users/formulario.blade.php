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
            <label for="name" class="form-label">Nombre</label>
            <input {{ $disabled }} type="text" name="name" class="form-control" id="name" value="{{ old('name',$user->name)}}" placeholder="Nombre">
            @error('name') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input {{ $disabled }}  type="text" name="email" class="form-control" id="email" value="{{ old('email',$user->email)}}" placeholder="Email">
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3 form-check">
            <input {{ $disabled }} type="checkbox" name="is_editor" id="is_editor" class="form-check-input" 
                {{ old('is_editor', $user->hasRole('editor')) ? 'checked' : '' }}>
            <label for="is_editor" class="form-check-label">Es Editor</label>
            @error('is_editor') <p class="text-danger">{{ $message }}</p> @enderror
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

