@extends('layouts.app')
@extends('adminlte::page')

@section('title', 'Gestión de servicio')

@section('content')
<br>
<p><a href="{{ url('/servicio/' . $servicio->id) }}" class="btn btn-secondary">Volver</a></p>
<h2>Gestión del servicio {{ $servicio->id }}</h2>
<div class="container table-responsive">
    
    <h3>Empleados</h3>

    @if ($servicio->users->isEmpty())
        <p>No hay usuarios asociados a este servicio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    @role(['admin', 'auxiliar'])
                    <th></th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($servicio->users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} {{ $user->apellidos }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->email }}</td>
                        @role(['admin', 'auxiliar'])
                        <td>
                            <form action="{{ route('servicios.opciones.destroy.users', ['id_servicio' => $servicio->id, 'id_user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @role(['admin', 'auxiliar'])
    <form action="{{ route('servicios.opciones.store.users', ['id_servicio' => $servicio->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_user" class="form-label">Agregar usuario</label>
            <select name="id_user" id="id_user" class="form-control">
                @foreach ($users_disponibles as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }} {{ $usuario->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <p><button type="submit" class="btn btn-primary">Agregar</button></p>
    </form>
    @endrole
</div>

<div class="container table-responsive">

    <h3>Fitosanitarios</h3>

    @if ($servicio->fitosanitarios->isEmpty())
        <p>No hay fitosanitarios asociados a este servicio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Número de registro</th>
                    <th>Descripción</th>
                    @role(['admin', 'auxiliar'])
                    <th></th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($servicio->fitosanitarios as $fitosanitario)
                    <tr>
                        <td>{{ $fitosanitario->id }}</td>
                        <td>{{ $fitosanitario->marca }}</td>
                        <td>{{ $fitosanitario->numero_registro }}</td>
                        <td>{{ $fitosanitario->descripcion }}</td>
                        @role(['admin', 'auxiliar'])
                        <td>
                            <form action="{{ route('servicios.opciones.destroy.fitosanitarios', ['id_servicio' => $servicio->id, 'id_fitosanitario' => $fitosanitario->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @role(['admin', 'auxiliar'])
    <form action="{{ route('servicios.opciones.store.fitosanitarios', ['id_servicio' => $servicio->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_fitosanitario" class="form-label">Agregar fitosanitario</label>
            <select name="id_fitosanitario" id="id_fitosanitario" class="form-control">
                @foreach ($fitosanitarios_disponibles as $fitosanitario)
                    <option value="{{ $fitosanitario->id }}">{{ $fitosanitario->id }} {{ $fitosanitario->marca }}</option>
                @endforeach
            </select>
        </div>
        <p><button type="submit" class="btn btn-primary">Agregar</button></p>
    </form>
    @endrole
</div>

<div class="container table-responsive">

    <h3>Maquinarias</h3>

    @if ($servicio->maquinarias->isEmpty())
        <p>No hay maquinarias asociadas a este servicio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Descripción</th>
                    @role(['admin', 'auxiliar'])
                    <th></th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($servicio->maquinarias as $maquinaria)
                    <tr>
                        <td>{{ $maquinaria->id }}</td>
                        <td>{{ $maquinaria->matricula }}</td>
                        <td>{{ $maquinaria->marca }}</td>
                        <td>{{ $maquinaria->descripcion }}</td>
                        @role(['admin', 'auxiliar'])
                        <td>
                            <form action="{{ route('servicios.opciones.destroy.maquinarias', ['id_servicio' => $servicio->id, 'id_maquinaria' => $maquinaria->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @role(['admin', 'auxiliar'])
    <form action="{{ route('servicios.opciones.store.maquinarias', ['id_servicio' => $servicio->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_maquinaria" class="form-label">Agregar maquinaria</label>
            <select name="id_maquinaria" id="id_maquinaria" class="form-control">
                @foreach ($maquinarias_disponibles as $maquinaria)
                    <option value="{{ $maquinaria->id }}">{{ $maquinaria->id }} {{ $maquinaria->marca }}</option>
                @endforeach
            </select>
        </div>
        <p><button type="submit" class="btn btn-primary">Agregar</button></p>
    </form>
    @endrole
</div>



@endsection
