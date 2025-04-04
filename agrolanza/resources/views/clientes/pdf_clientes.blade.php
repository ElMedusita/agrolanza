<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Clientes
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
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Código postal</b></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->nombre }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->apellidos }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->identificacion }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->email }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->telefono }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $cliente->codigo_postal }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
