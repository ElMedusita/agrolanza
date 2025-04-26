<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Maquinarias</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Maquinarias
    </h1>

    <div class="table-responsive" style="font-family: Arial, sans-serif;">

        <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Número de serie</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Matrícula</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Marca</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Descripción</b></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($maquinarias as $maquinaria)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->numero_serie }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->matricula }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->marca }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $maquinaria->descripcion }}</td>
              
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
