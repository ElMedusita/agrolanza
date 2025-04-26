@extends('layouts.app')
@extends('adminlte::page')

@section('title', 'Consultar mapa')

@section('content')

<br>
<p><a href="{{ url('/parcelas') }}" class="btn btn-secondary">Volver</a></p>

    @if(session('success'))
        <p style="text-align:center;" class="alert alert-success">{{ session('success') }}</p>
    @endif
    
    <div class="mb-3 row">
        <div class="col-md-6">
            <label for="latitud" class="form-label">Latitud</label>
            <input type="number" step="0.000001" name="latitud" class="form-control" id="latitud" value="{{ old('latitud', $parcela->latitud ?? '') }}" placeholder="Latitud">
            @error('latitud') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="col-md-6">
            <label for="longitud" class="form-label">Longitud</label>
            <input type="number" step="0.000001" name="longitud" class="form-control" id="longitud" value="{{ old('longitud', $parcela->longitud ?? '') }}" placeholder="Longitud">
            @error('longitud') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
    </div>

    <div id="show_map" style="height: 700px; margin-top: 50px;"></div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    @php
        $script_leaflet = "<script src=\"" . asset('js/leaflet/actualizar_ubicacion.js') . "\"></script>";
        echo $script_leaflet;
    @endphp

    <br>
    
@endsection
