@extends('adminlte::page')

@section('title', 'Inicio')

@section('content')
<pre></pre>
<div style="text-align: center">
    <h1>Bienvenido, {{ auth()->user()->name }}!</h1>
    <p>Sistema centralizado de Agrolanza S.L.</p>
</div>

<pre></pre>
    <!-- Servicios y Actividades -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consulta de servicios agrarios</h5>
                    <p class="card-text">Visualización y exportación de información: Maquinarias, productos fitosanitarios, servicios a parcelas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestión de datos centralizada</h5>
                    <p class="card-text">Integridad, disponibilidad y confidencialidad de datos para personal autorizado.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consulta de productos fitosanitarios</h5>
                    <p class="card-text">Sección con información detallada, y herramienta de cálculo de dosis y otros datos de interés en ámbito fitosanitario.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-container">
        <div class="overlay"></div> <!-- Capa oscura para mejorar la legibilidad -->
        </div>
    </div>

<pre></pre>

<!-- Contenedor principal con flexbox -->
<div class="d-flex flex-wrap justify-content-between mt-4">
    <!-- Horarios de Atención -->
    <div class="contact-info flex-fill text-center">
        <h2 class="section-title">Horario</h2>
        <ul class="list-group">
            <p>Lunes a Viernes: 7:00 a 14:00 horas.</p>
            <p>Sábados: 7:00 a 11:00 horas.</p>
        </ul>
    </div>

    <!-- Información de Contacto -->
    <div class="contact-info flex-fill text-center">
    <h2 class="section-title">Contacto con administración</h3>
        <p><strong>Teléfono:</strong> 928 81 01 00, extensiones 3100, 3114, 3115</p>
        <p><strong>Correo Electrónico:</strong> <a href="mailto:administracion@agrolanza.com">administracion@agrolanza.com</a></p>
    </div>

</div>

<!-- Derechos de autor -->
<div class="text-center mt-4">
    <p class="small text-muted">&copy; {{ date('Y') }} Agrolanza S.L. Todos los derechos reservados.</p>
</div>


@stop

@section('css')
    <style>
        .welcome-container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('{{ asset('img/fondo_inicio.jpg') }}') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
        }

        .content {
            position: relative;
            z-index: 2;
        }
    </style>

@stop
