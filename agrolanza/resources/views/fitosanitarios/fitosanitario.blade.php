
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de productos fitosanitarios')

@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Nombre</b></td>
            <td><b>Marca</b></td>
            <td><b>Tipo</b></td>
            <td><b>Dosis máxima</b></td>
            <td><b>Plazo de seguridad</b></td>
            <td><b></b></td>
        </tr>
    
    @foreach ($fitosanitarios as $fitosanitario)
        
    <tr>
        <td>{{ $fitosanitario->nombre }}</td>
        <td>{{ $fitosanitario->marca }}</td>
        <td>{{ $TIPOS[$fitosanitario->tipo] }}</td> 
        <td>{{ $fitosanitario->dosis_maxima }}</td> 
        <td>{{ $fitosanitario->plazo_seguridad }} días</td> 

        @role(['admin', 'auxiliar'])
        <td>
            <div>
                <a href="/fitosanitario/{{ $fitosanitario->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                <a href="/fitosanitario/actualizar/{{ $fitosanitario->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/fitosanitario/eliminar/{{ $fitosanitario->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
        </td>
        @endrole

    @endforeach

    </table>
    {{ $fitosanitarios->links() }}
</div>
    @role('admin')
    <a href="/fitosanitarios/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo fitosanitario</a>
    @endrole


@endsection