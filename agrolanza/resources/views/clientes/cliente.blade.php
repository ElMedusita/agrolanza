
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de clientes')

@section('content')

<br>
    
    <h2>Clientes</h2>

<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Identificación</b></td>
            <td><b>Nombre y apellidos</b></td>
            <td><b>Correo electrónico</b></td>
            <td><b>Teléfono</b></td>
            <td><b>Código postal</b></td>
            <td><b>Acciones</b></td>
        </tr>

    
    @foreach ($clientes as $cliente)
        

    <tr>
        <td>{{ $cliente->identificacion }}</td>
        <td>{{ $cliente->nombre}} {{ $cliente->apellidos}}</td> 
        <td>{{ $cliente->email }}</td>
        <td>{{ $cliente->telefono }}</td> 
        <td>{{ $cliente->codigo_postal }}</td> 
        
        @role(['admin', 'auxiliar'])
        <td>
            <div>
            <a href="/cliente/pdf/{{ $cliente->id }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i></a>
                <a href="/cliente/{{ $cliente->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                <a href="/cliente/actualizar/{{ $cliente->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/cliente/eliminar/{{ $cliente->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
        </td>
        @endrole

    @endforeach

    </table>
    {{ $clientes->links() }}
</div>
    @role('admin')
    <p><a href="{{ url('/home') }}" class="btn btn-secondary">Volver</a> <a href="/clientes/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo cliente</a> <a href="/clientes/pdf" class="btn btn-danger">Generar PDF</a></p>
    @endrole


@endsection