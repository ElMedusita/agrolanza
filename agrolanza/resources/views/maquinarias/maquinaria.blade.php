
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de maquinarias')

@section('content')

<h2>Maquinarias</h2>

<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Número de serie</b></td>
            <td><b>Matrícula</b></td>
            <td><b>Marca</b></td>
            <td><b>Descripción</b></td>
            <td><b>Acciones</b></td>
        </tr>

    
    @foreach ($maquinarias as $maquinaria)
        

    <tr>
        <td>{{ $maquinaria->numero_serie }}</td>
        <td>{{ $maquinaria->matricula}}</td> 
        <td>{{ $maquinaria->marca }}</td>
        <td>{{ $maquinaria->descripcion }}</td> 
        
        @role(['admin', 'auxiliar'])
        <td>
            <div>
                <a href="/maquinaria/pdf/{{ $maquinaria->id }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i></a>
                <a href="/maquinaria/{{ $maquinaria->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                <a href="/maquinaria/actualizar/{{ $maquinaria->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/maquinaria/eliminar/{{ $maquinaria->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
        </td>
        @endrole

    @endforeach

    </table>
    {{ $maquinarias->links() }}
</div>
    @role('admin')
    <p><a href="{{ url('/home') }}" class="btn btn-secondary">Volver</a> <a href="/maquinarias/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nueva maquinaria</a> <a href="/maquinarias/pdf" class="btn btn-danger">Generar PDF</a></p>
    @endrole


@endsection