<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cliente {{ $cliente->nombre }} {{ $cliente->apellidos }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Cliente {{ $cliente->nombre }} {{ $cliente->apellidos }}
    </h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Identificación</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->identificacion }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Nombre</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->nombre }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Apellidos</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->apellidos }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Email</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->email ?? '—' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Teléfono</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->telefono }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Código postal</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->codigo_postal }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
