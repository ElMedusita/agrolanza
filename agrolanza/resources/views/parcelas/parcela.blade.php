
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de parcelas')

@section('content')

<br>
    
    <h2>Parcelas</h2>

<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Titular de la parcela</b></td>
            <td><b>Referencia catastral</b></td>
            <td><b>Superficie</b></td>
            <td><b>Latitud</b></td>
            <td><b>Longitud</b></td>
            <td><b>Acciones</b></td>
        </tr>

    
    @foreach ($parcelas as $parcela)
        

    <tr>
        <td>{{ $parcela->cliente->nombre }} {{ $parcela->cliente->apellidos }}</td>
        <td>{{ $parcela->referencia_catastral}}</td> 
        <td>{{ $parcela->superficie }} m²</td>
        <td>{{ $parcela->latitud }}</td> 
        <td>{{ $parcela->longitud }}</td>
        
        
        <td>
            <div>
                <a href="/parcela/pdf/{{ $parcela->id }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i></a>
                <a href="/parcela/{{ $parcela->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                @role(['admin', 'auxiliar'])
                <a href="/parcela/actualizar/{{ $parcela->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/parcela/eliminar/{{ $parcela->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                @endrole
            </div>
        </td>
        

    @endforeach

    </table>
    {{ $parcelas->links() }}
</div>
    
    <p>
        <a href="{{ url('/home') }}" class="btn btn-secondary">Volver</a>
        @role('admin')
        <a href="/parcelas/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nueva parcela</a>
        @endrole
        <a href="/parcelas/pdf" class="btn btn-danger">Generar PDF</a>
    </p>
    


@endsection