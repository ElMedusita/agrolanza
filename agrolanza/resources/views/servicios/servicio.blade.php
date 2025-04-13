
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de servicios')

@section('content')

<h2>Servicios</h2>

<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Fecha</b></td>
            <td><b>Hora</b></td>
            <td><b>Duración</b></td>
            <td><b>Parcela</b></td>
            <td><b>Representante</b></td>
            <td><b>Tipo de servicio</b></td>
            <td><b>Presupuesto</b></td>
            <td><b>Estado</b></td>
            <td><b>Acciones</b></td>
        </tr>

    
        @foreach ($servicios as $servicio)

            @php

                $fecha_actual = Carbon\Carbon::now();
                $es_pasado = $servicio->fecha_servicio <= $fecha_actual;
                $usuario_asociado = $servicio->users->contains(auth()->id());

                $estilo = '';
                if ($es_pasado) {
                    $estilo = 'background-color:rgb(255, 234, 234);'; // rojo claro
                } elseif ($usuario_asociado) {
                    $estilo = 'background-color:rgb(234, 255, 234);'; // verde claro
                }
            @endphp

            <tr>
                <td style="{{ $estilo }}">
                    {{ \Carbon\Carbon::parse($servicio->fecha_servicio)->format('d-m-Y') }}
                </td>
                <td style="{{ $estilo }}">
                    {{ \Carbon\Carbon::parse($servicio->hora_servicio)->format('H:i') }}
                </td>
                <td style="{{ $estilo }}">{{ $servicio->duracion }} horas</td>
                <td style="{{ $estilo }}">{{ $servicio->parcela->referencia_catastral }}</td>
                <td style="{{ $estilo }}">{{ $servicio->parcela->cliente->nombre }}</td>
                <td style="{{ $estilo }}">{{ $TIPOS_SERVICIO[$servicio->tipo_servicio] }}</td> 
                <td style="{{ $estilo }}">{{ $servicio->presupuesto }} €</td> 
                <td style="{{ $estilo }}" class="{{ $servicio->estado }}"><b>{{ $ESTADOS[$servicio->estado] }}</b></td> 
                <td style="{{ $estilo }}">
                    <div>
                        <a href="/servicio/pdf/{{ $servicio->id }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i></a>
                        <a href="/servicio/{{ $servicio->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                        @role(['admin', 'auxiliar'])
                        <a href="/servicio/actualizar/{{ $servicio->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="/servicio/eliminar/{{ $servicio->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        @endrole
                    </div>
                </td>
            </tr>

        @endforeach



    </table>
    {{ $servicios->links() }}
</div>
    
<p>
    <a href="{{ url('/home') }}" class="btn btn-secondary">Volver</a>
    @role('admin|auxiliar')
    <a href="/servicios/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo servicio</a>
    @endrole
    <a href="/servicios/pdf" class="btn btn-danger">Generar PDF</a>
</p>
<br>

<script src="{{ asset('js/styles/estado_pago.js') }}"></script>

@endsection

