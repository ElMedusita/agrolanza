@extends('layouts.app')
@extends('adminlte::page')

@section('title', 'Alta de parcela')

@section('content')

<br>
<p><a href="{{ url('/parcelas') }}" class="btn btn-secondary">Volver</a></p>

<h2>Gestión de parcela</h2>

    @php
        if (session('formData'))
            $parcela = session('formData');

        $disabled = '';
        $boton_guardar = '<button type="submit" class="btn btn-primary">Guardar</button>';
        $script_leaflet = "<script src=\"" . asset('js/leaflet/actualizar_ubicacion.js') . "\"></script>";

        if (session('formData') || $oper == 'cons' || $oper == 'supr')
        {
            $disabled = 'disabled';
            if ($oper == 'supr')
                $boton_guardar = '<button type="submit" class="btn btn-danger">Eliminar</button>';
            else
                $boton_guardar = '';
                $script_leaflet = "<script src=\"" . asset('js/leaflet/mostrar_ubicacion.js') . "\"></script>";

        }
    @endphp

    <br />
    @if(session('success'))
        <p style="text-align:center;" class="alert alert-success">{{ session('success') }}</p>
    @endif
    
    <form action="{{ route('parcelas.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $parcela->id }}" />
        
        <div class="mb-3">
            <label for="id_cliente" class="form-label">Titular de la parcela *</label>
            <select {{ $disabled }} name="id_cliente" id="id_cliente" class="form-select form-select-sm">
                <option value="">Selecciona un cliente...</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" 
                        {{ old('id_cliente', $parcela->id_cliente ?? '') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellidos }}
                    </option>
                @endforeach
            </select>
            @error('id_cliente') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="referencia_catastral" class="form-label">Referencia catastral *</label>
            <input {{ $disabled }} type="text" name="referencia_catastral" class="form-control" id="referencia_catastral" value="{{ old('referencia_catastral',$parcela->referencia_catastral)}}" placeholder="Referencia catastral">
            @error('referencia_catastral') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="superficie" class="form-label">Superficie *</label>
            <input {{ $disabled }} type="number" step="1" min="1" name="superficie" class="form-control" id="superficie" value="{{ old('superficie',$parcela->superficie)}}" placeholder="Superficie">
            @error('superficie') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="latitud" class="form-label">Latitud *</label>
            <input {{ $disabled }} type="number" step="0.000001" name="latitud" class="form-control" id="latitud" value="{{ old('latitud', $parcela->latitud ?? '') }}" placeholder="Latitud">
            @error('latitud') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="longitud" class="form-label">Longitud *</label>
            <input {{ $disabled }} type="number" step="0.000001" name="longitud" class="form-control" id="longitud" value="{{ old('longitud', $parcela->longitud ?? '') }}" placeholder="Longitud">
            @error('longitud') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        @php echo $boton_guardar; @endphp

    </form>

    <div id="show_map" style="height: 400px; margin-top: 20px;"></div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    @php echo $script_leaflet; @endphp

    <br>
    
@endsection
