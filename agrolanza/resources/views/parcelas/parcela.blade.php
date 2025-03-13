
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de parcelas')

@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Titular de la parcela</b></td>
            <td><b>Referencia catastral</b></td>
            <td><b>Superficie</b></td>
            <td><b>Latitud</b></td>
            <td><b>Longitud</b></td>
        </tr>

    
    @foreach ($parcelas as $parcela)
        

    <tr>
        <td>{{ $parcela->cliente->nombre }} {{ $parcela->cliente->apellidos }}</td>
        <td>{{ $parcela->referencia_catastral}}</td> 
        <td>{{ $parcela->superficie }}</td>
        <td>{{ $parcela->latitud }}</td> 
        <td>{{ $parcela->longitud }}</td>
        
        @role(['admin', 'auxiliar'])
        <td>
            <div>
                <a href="/parcela/{{ $parcela->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                <a href="/parcela/actualizar/{{ $parcela->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/parcela/eliminar/{{ $parcela->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
        </td>
        @endrole

    @endforeach

    </table>
    {{ $parcelas->links() }}
</div>
    @role('admin')
    <a href="/parcelas/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nueva parcela</a>
    @endrole


@endsection