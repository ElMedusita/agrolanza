@extends('layouts.app')
@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Empleados del servicio: {{ $servicio->id }}</h2>

    @if ($servicio->users->isEmpty())
        <p>No hay usuarios asociados a este servicio.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicio->users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ url('/servicio/' . $servicio->id) }}" class="btn btn-secondary">Volver</a>

</div>
@endsection
