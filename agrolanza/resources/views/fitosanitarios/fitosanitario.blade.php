
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de productos fitosanitarios')

@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Nombre</b></td>
            <td><b>Tipo</b></td>
            <td><b>Materia activa</b></td>
            <td><b>Dosis máxima</b></td>
            <td><b>Plazo de seguridad</b></td>
            <td><b></b></td>
        </tr>
    
    @foreach ($fitosanitarios as $fitosanitario)
        
    <tr>
        <td>{{ $fitosanitario->nombre }}</td>
        <td>{{ $TIPOS[$fitosanitario->tipo] }}</td> 
        @php
            $medida_ma = 'g';
            if ($fitosanitario->estado == 'VV')
                $medida_ma = 'cm³';

            $medida_fs = 'cm³';
            if ($fitosanitario->estado == 'PP')
                $medida_fs = 'g';

            $unidad_fs = 'l';
            if ($medida_fs == 'g')
                $unidad_fs = 'kg';
        @endphp
        <td>{{ $fitosanitario->materia_activa }} | {{ $fitosanitario->cantidad_materia_activa}} {{ $medida_ma }} / {{ $unidad_fs }}</td>
        <td>{{ $fitosanitario->dosis_maxima }} {{ $medida_fs }} / l</td> 
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