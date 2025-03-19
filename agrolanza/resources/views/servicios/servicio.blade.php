
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de servicios')

@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Parcela</b></td>
            <td><b>Representante</b></td>
            <td><b>Tipo de servicio</b></td>
            <td><b>Fecha de servicio</b></td>
            <td><b>Duración</b></td>
            <td><b>Presupuesto</b></td>
            <td><b>Estado</b></td>
            <td><b></b></td>
        </tr>

    
    @foreach ($servicios as $servicio)

    <tr>
        <td>{{ $servicio->parcela->referencia_catastral }}</td>
        <td>{{ $servicio->parcela->cliente->nombre }}</td>
        <td>{{ $TIPOS_SERVICIO[$servicio->tipo_servicio] }}</td> 
        <td>
            @php
            $fecha = new DateTime($servicio->fecha_servicio);
            echo $fecha->format('d-m-Y');
            @endphp
        </td> 
        <td>{{ $servicio->duracion }} horas</td>
        <td>{{ $servicio->presupuesto }} €</td> 
        <td class='{{ $servicio->estado }}'> <b>{{ $ESTADOS[$servicio->estado] }} </b></td> 

        
        @role(['admin', 'auxiliar'])
        <td>
            <div>
                <a href="/servicio/{{ $servicio->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                <a href="/servicio/actualizar/{{ $servicio->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/servicio/eliminar/{{ $servicio->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
        </td>
        @endrole

    @endforeach

    </table>
    {{ $servicios->links() }}
</div>
    @role('admin')
    <a href="/servicios/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo servicio</a>
    @endrole

<script src="{{ asset('js/styles/estado_pago.js') }}"></script>

@endsection

