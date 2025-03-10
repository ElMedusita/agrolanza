@extends('layouts.app')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agrolanza</title>
    </head>
    <body class="bg-light d-flex flex-column min-vh-100 p-4">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/home') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Inicio
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <pre></pre>
        <div class="container d-flex justify-content-center flex-grow-1">
            <main class="row bg-white shadow rounded p-4 w-100" style="max-width: 700px; max-height: 250px;">
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
</html>
