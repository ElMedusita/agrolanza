
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Listado de usuarios')

@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            @role('admin')
            <td>#</td>
            @endrole
            @role('editor')
            <td>#</td>
            @endrole
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Email</td>
            <td>Contraseña</td>
        </tr>

    
    @foreach ($users as $user)
        

    <tr>
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

        <td>{{ $user->name }}</td>
        <td>{{ $user->apellidos}}</td> 
        <td>{{ $user->email }}</td> 
        <td>**********</td>
</tr>

    @endforeach

    </table>
    {{ $users->links() }}
</div>
    @role('admin')
    <a href="/users/nuevo" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo usuario</a>
    @endrole


@endsection