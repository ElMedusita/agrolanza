<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parcela {{ $parcela->referencia_catastral }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
    Parcela {{ $parcela->referencia_catastral }} - {{ $parcela->cliente->nombre }} {{ $parcela->cliente->apellidos }}
    </h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Referencia catastral</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->referencia_catastral }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Titular</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->cliente->nombre }} {{ $parcela->cliente->apellidos }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Superficie</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->superficie }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Latitud</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->latitud }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Longitud</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->longitud }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
