<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parcelas</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Parcelas
    </h1>

    <div class="table-responsive" style="font-family: Arial, sans-serif;">

        <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Titular</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>R. catastral</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Superficie</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Latitud</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Longitud</b></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($parcelas as $parcela)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->cliente->nombre }} {{ $parcela->cliente->apellidos }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->referencia_catastral }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->superficie }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->latitud }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $parcela->longitud }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
