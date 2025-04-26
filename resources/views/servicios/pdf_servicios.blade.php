<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333;">

    <h1 style="text-align: center; color: #444; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Servicios
    </h1>

    <div class="table-responsive" style="font-family: Arial, sans-serif;">

        <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ccc; padding: 8px;"><b>ID servicio</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Fecha y hora</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Duración</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Tipo de servicio</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Parcela</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Representante</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Presupuesto</b></th>
                    <th style="border: 1px solid #ccc; padding: 8px;"><b>Método de pago</b></th>
                    <td style="border: 1px solid #ccc; padding: 8px;"><b>Estado</b></td>
                </tr>
            </thead>
            <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->id }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ \Carbon\Carbon::parse($servicio->servicio)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($servicio->hora_servicio)->format('H:i') }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->duracion }} horas</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $TIPOS_SERVICIO[$servicio->tipo_servicio] }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->parcela->referencia_catastral }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->parcela->cliente->nombre }} {{ $servicio->parcela->cliente->apellidos }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $servicio->presupuesto }} €</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $METODOS_PAGO[$servicio->metodo_pago] }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $ESTADOS[$servicio->estado] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
