
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de empleados')

@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            <td><b>Nombre</b></td>
            <td><b>Apellidos</b></td>
            <td><b>Fecha nacimiento</b></td>
            <td><b>Email</b></td>
            <td><b>Teléfono</b></td>
            <td><b>Estado laboral</b></td>
            <td><b>Acciones</b></td>
        </tr>

    
    @foreach ($users as $user)
        

    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->apellidos}}</td> 
        <td>{{ $user->fecha_nacimiento }}</td>
        <td>{{ $user->email }}</td> 
        <td>{{ $user->telefono }}</td>
        <td class="estado"><b>
            @php
                $fecha_actual =  \Carbon\Carbon::now();

                if ((($fecha_actual>=$user->fecha_inicio) && ($fecha_actual <=$user->fecha_fin)) || (($fecha_actual>=$user->fecha_inicio) && (empty($user->fecha_fin))))
                {
                    $estado_trabajo = "Activo";
                }
                else
                {
                    $estado_trabajo = "Inactivo";
                }
            @endphp
            {{ $estado_trabajo }}
        </b></td>
        @role('admin')
        <td>
            <div>
                <a href="/user/{{ $user->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                <a href="/user/actualizar/{{ $user->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/user/eliminar/{{ $user->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
        </td>
        @endrole

        @role('editor')
        <td>
            <div>
                <a href="/user/actualizar/{{ $user->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            </div>
        </td>
        @endrole

    @endforeach

    </table>
    {{ $users->links() }}
</div>
@role('admin')
<a href="/users/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo usuario</a>
@endrole
<script src="{{ asset('js/styles/estado_empleado.js') }}"></script>

@endsection

