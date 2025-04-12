@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrolanza</title>
    <!-- Bootstrap CSS (ya debe estar incluido si usas layouts.app) -->
</head>
<body class="bg-light d-flex flex-column min-vh-100 p-4">
    <header class="container mb-4">
        @if (Route::has('login'))
            <nav class="d-flex justify-content-end gap-2">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-outline-dark btn-sm">
                        Inicio
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">
                        Log in
                    </a>

                @endauth
            </nav>
        @endif
    </header>

    <div class="container d-flex justify-content-center flex-grow-1">
        <main class="row  shadow rounded p-4" style="max-width: 900px; max-height: 350px;">
            <div class="col-md-6 mb-3">
                <h1 class="text-success">Bienvenido a Agrolanza</h1>
                <p class="text-muted">Especialistas en soluciones agrícolas sostenibles para un futuro más verde.</p>
                <ul class="list-unstyled">
                    <li>🚜 Servicios agrícolas innovadores</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="/img/fondo_acceso.jpg" alt="Agrolanza" class="img-fluid rounded">
            </div>
        </main>
    </div>

    <footer class="text-center mt-4">
        <p class="small text-muted">&copy; {{ date('Y') }} Agrolanza. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

