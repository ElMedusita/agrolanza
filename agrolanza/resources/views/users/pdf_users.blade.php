<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Empleados
    </h1>

    <div class="table-responsive" style="font-family: Arial, sans-serif;">

        <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Nombre</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Apellidos</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Identificación</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Email</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Teléfono</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Dirección</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Localidad</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Código postal</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Fecha de comienzo</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Fecha de fin</b></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->name }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->apellidos }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->identificacion }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->email }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->telefono }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->direccion }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->localidad }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->codigo_postal }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">
                        {{ \Carbon\Carbon::parse($user->fecha_comienzo)->format('d-m-Y') }}
                    </td>
                    <td style="border: 1px solid #ccc; padding: 8px;">
                        {{ $user->fecha_fin ? \Carbon\Carbon::parse($user->fecha_fin)->format('d-m-Y') : '—' }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
