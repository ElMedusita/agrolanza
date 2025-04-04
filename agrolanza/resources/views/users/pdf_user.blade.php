<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empleado {{ $user->name }} {{ $user->apellidos }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Empleado {{ $user->name }} {{ $user->apellidos }}
    </h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Identificación</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->identificacion }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Nombre</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->name }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Apellidos</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->apellidos }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Email</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->email }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Teléfono</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->telefono }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Dirección</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->direccion }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Localidad</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->localidad }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Código postal</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->codigo_postal }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">IBAN</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $user->iban }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Fecha de nacimiento</td>
                <td style="border: 1px solid #ccc; padding: 8px;">
                    {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Fecha de comienzo</td>
                <td style="border: 1px solid #ccc; padding: 8px;">
                    {{ \Carbon\Carbon::parse($user->fecha_comienzo)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Fecha de fin</td>
                <td style="border: 1px solid #ccc; padding: 8px;">
                    {{ $user->fecha_fin ? \Carbon\Carbon::parse($user->fecha_fin)->format('d-m-Y') : '—' }}
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
