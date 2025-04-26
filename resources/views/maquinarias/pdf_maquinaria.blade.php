<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Maquinaria {{ $maquinaria->matricula }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
    Maquinaria {{ $maquinaria->matricula }}
    </h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Número de serie</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->numero_serie }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Matrícula</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->matricula }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Marca</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->marca }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Descripción</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->descripcion }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
