<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicio {{ $servicio->id }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
    Servicio {{ $servicio->id }}
    </h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Nombre</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->nombre }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Marca</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->marca }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Registro</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->numero_registro }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Tipo</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $TIPOS[$fitosanitario->tipo] }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Estado</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $ESTADOS[$fitosanitario->estado] }}</td>
            </tr>
            @php
                $medida_ma = 'g';
                if ($fitosanitario->estado == 'VV')
                    $medida_ma = 'cm³';

                $medida_fs = 'cm³';
                if ($fitosanitario->estado == 'PP')
                    $medida_fs = 'g';

                $unidad_fs = 'l';
                if ($medida_fs == 'g')
                    $unidad_fs = 'kg';
            @endphp
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Descripción</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->descripcion }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Entidad vendedora</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->entidad_vendedora }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Materia activa</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->materia_activa }} | {{ $fitosanitario->cantidad_materia_activa}} {{ $medida_ma }} / {{ $unidad_fs }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Dosis máxima</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->dosis_maxima }} {{ $medida_fs }} / l</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Plazo de seguridad</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->plazo_seguridad }} días</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; font-weight: bold;">Observaciones</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->observaciones }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
