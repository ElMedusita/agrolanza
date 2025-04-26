<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fitosanitarios</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Fitosanitarios
    </h1>

    <div class="table-responsive" style="font-family: Arial, sans-serif;">

        <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Nombre</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Marca</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Tipo</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Estado</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Materia activa</b></th>
                    <td style="border: 1px solid #ccc; padding: 8px;"><b>Dosis máxima</b></td>
                    <td style="border: 1px solid #ccc; padding: 8px;"><b>Plazo de seguridad</b></td>
                    <td style="border: 1px solid #ccc; padding: 8px;"><b>Materia activa</b></td>
                </tr>
            </thead>
            <tbody>
            @foreach ($fitosanitarios as $fitosanitario)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->nombre }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->marca }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $TIPOS[$fitosanitario->tipo] }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $ESTADOS[$fitosanitario->estado] }}</td>
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
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->materia_activa }} | {{ $fitosanitario->cantidad_materia_activa}} {{ $medida_ma }} / {{ $unidad_fs }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->dosis_maxima }} {{ $medida_fs }} / l</td> 
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->plazo_seguridad }} días</td> 
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $fitosanitario->materia_activa }} - {{ $fitosanitario->dosis_maxima }} {{ $medida_ma }} / {{ $unidad_fs }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
