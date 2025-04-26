<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicio {{ $servicio->id }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
    Servicio {{$servicio->id}} - {{ \Carbon\Carbon::parse($servicio->servicio)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($servicio->hora_servicio)->format('H:i') }}
    </h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">ID servicio</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->id }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Fecha y hora</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ \Carbon\Carbon::parse($servicio->servicio)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($servicio->hora_servicio)->format('H:i') }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Duración</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->duracion }} horas</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Tipo de servicio</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $TIPOS_SERVICIO[$servicio->tipo_servicio] }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Parcela</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->parcela->referencia_catastral }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Representante</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->parcela->cliente->nombre }} {{ $servicio->parcela->cliente->apellidos }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Descripción</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->descripcion }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Presupuesto</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->presupuesto }} €</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Método de pago</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $METODOS_PAGO[$servicio->metodo_pago] }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Estado</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $ESTADOS[$servicio->estado] }}</td>
            </tr>
        </tbody>
    </table>

    @if (!$servicio->users->isEmpty())
        <h2 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
            Empleados
        </h2>
        <div class="table-responsive" style="font-family: Arial, sans-serif;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>ID</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Nombre</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Teléfono</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Email</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicio->users as $user)
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->id }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->name }} {{ $user->apellidos }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->telefono }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (!$servicio->fitosanitarios->isEmpty())
        <h2 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
            Fitosanitarios
        </h2>
        <div class="table-responsive" style="font-family: Arial, sans-serif;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>ID</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Marca</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Número de registro</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Descripción</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicio->fitosanitarios as $fitosanitario)
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->id }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->marca }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->numero_registro }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (!$servicio->maquinarias->isEmpty())
        <h2 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
            Maquinarias
        </h2>
        <div class="table-responsive" style="font-family: Arial, sans-serif;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>ID</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Matrícula</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Marca</b></th>
                        <th style="border: 1px solid #ccc; padding: 8px;"><b>Descripción</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicio->maquinarias as $maquinaria)
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->id }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->matricula }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->marca }}</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</body>
</html>
