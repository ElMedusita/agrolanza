@extends('layouts.app')
@extends('adminlte::page')

@section('title', 'Alta de servicio')

@section('content')

    <br>
    <p><a href="{{ url('/servicios') }}" class="btn btn-secondary">Volver</a></p>

    <h2>Gestión de servicios</h2>

    @php
        if (session('formData'))
            $servicio = session('formData');

        $disabled = '';
        $boton_guardar = '<button type="submit" class="btn btn-primary">Guardar</button>';
        $script_leaflet = "<script src=\"" . asset('js/leaflet/mostrar_ubicacion.js') . "\"></script>";
        $gestion_empleados = '<p><a href="' . route('servicio.opciones', ['id' => $servicio->id]) . '" class="btn btn-primary">Gestionar servicio</a></p>';


        if ($oper != 'cons')
        {
            $gestion_empleados = '';
        }

        if (session('formData') || $oper == 'cons' || $oper == 'supr')
        {
            $disabled = 'disabled';
            if ($oper == 'supr')
                $boton_guardar = '<button type="submit" class="btn btn-danger">Eliminar</button>';
            else
                $boton_guardar = '';
        }
    @endphp

    <br />
    @if(session('success'))
        <p style="text-align:center;" class="alert alert-success">{{ session('success') }}</p>
    @endif
    
    @php echo $gestion_empleados; @endphp

    <form action="{{ route('servicios.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $servicio->id }}" />
        
        <div class="mb-3">
            <label for="id_parcela" class="form-label">Parcela</label>
            <select {{ $disabled }} name="id_parcela" id="id_parcela" class="form-select form-select-sm">
                <option value="">Selecciona una parcela...</option>
                @foreach ($parcelas as $parcela)
                    <option value="{{ $parcela->id }}" 
                        {{ old('id_parcela', $servicio->id_parcela ?? '') == $parcela->id ? 'selected' : '' }}>
                        {{ $parcela->referencia_catastral }} - {{ $parcela->cliente->nombre }} {{ $parcela->cliente->apellidos }}
                    </option>
                @endforeach
            </select>
            @error('id_parcela') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="hidden" id="latitud" value="{{ $servicio->parcela->latitud ?? '' }}">
            <input type="hidden" id="longitud" value="{{ $servicio->parcela->longitud ?? '' }}">
        </div>

        <!-- Cargar Leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

        <!-- Pasar datos de Laravel a JavaScript -->
        <script>
            var parcelas = @json($parcelas);
        </script>

        @php echo $script_leaflet; @endphp

        <div id="show_map" style="height: 400px; margin-top: 20px;"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#id_parcela').change(function () {
                    var parcelaId = $(this).val();
                    
                    // Buscar la opción seleccionada en la lista de parcelas
                    var seleccionada = parcelas.find(p => p.id == parcelaId);

                    if (seleccionada) {
                        $('#latitud').val(seleccionada.latitud);
                        $('#longitud').val(seleccionada.longitud);
                        updateMap();
                    } else {
                        $('#latitud').val('');
                        $('#longitud').val('');
                    }
                });
            });
        </script>

        <div id="show_map"></div>

        <br>

        <div class="mb-3">
            <label for="tipo_servicio" class="form-label">Tipo de servicio</label>
            <select {{ $disabled }}  name="tipo_servicio" id="tipo_servicio" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">Selecciona un tipo...</option>
                @foreach ($TIPOS_SERVICIO as $clave_tipo_servicio => $texto_tipo_servicio)
        
                    @php
                        $selected = old('tipo_servicio') == $clave_tipo_servicio || $servicio->tipo_servicio == $clave_tipo_servicio ? 'selected="selected"' : '';
                    @endphp

                    <option value="{{ $clave_tipo_servicio }}" {{ $selected }}>{{ $texto_tipo_servicio }}</option>

                @endforeach
            </select>
            @error('tipo_servicio') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input {{ $disabled }} type="text" name="descripcion" class="form-control" id="descripcion" value="{{ old('descripcion',$servicio->descripcion)}}" placeholder="Descripción">
            @error('descripcion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_servicio" class="form-label">Fecha servicio</label>
            <input {{ $disabled }}  type="date" name="fecha_servicio" class="form-control" id="fecha_servicio" value="{{ old('fecha_servicio',$servicio->fecha_servicio)}}" placeholder="Fecha servicio">
            @error('fecha_servicio') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="hora_servicio" class="form-label">Hora servicio</label>
            <input {{ $disabled }} type="time" name="hora_servicio" class="form-control" id="hora_servicio" value="{{ old('hora_servicio', $servicio->hora_servicio) }}">
            @error('hora_servicio') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (en horas)</label>
            <input {{ $disabled }} type="number" step="1" min="1" max="8" name="duracion" class="form-control" id="duracion" value="{{ old('duracion', $servicio->duracion ?? '') }}" placeholder="Duración">
            @error('duracion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="presupuesto" class="form-label">Presupuesto</label>
            <input {{ $disabled }} type="number" step="0.01" name="presupuesto" class="form-control" id="presupuesto" value="{{ old('presupuesto', $servicio->presupuesto ?? '') }}" placeholder="Presupuesto">
            @error('presupuesto') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de pago</label>
            <select {{ $disabled }}  name="metodo_pago" id="metodo_pago" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">Selecciona un método...</option>
                @foreach ($METODOS_PAGO as $clave_metodo_pago => $texto_metodo_pago)
        
                    @php
                        $selected = old('metodo_pago') == $clave_metodo_pago || $servicio->metodo_pago == $clave_metodo_pago ? 'selected="selected"' : '';
                    @endphp

                    <option value="{{ $clave_metodo_pago }}" {{ $selected }}>{{ $texto_metodo_pago }}</option>

                @endforeach
            </select>
            @error('metodo_pago') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado de pago</label>
            <select {{ $disabled }}  name="estado" id="estado" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">Selecciona un estado...</option>
                @foreach ($ESTADOS as $clave_estado => $texto_estado)
        
                    @php
                        $selected = old('estado') == $clave_estado || $servicio->estado == $clave_estado ? 'selected="selected"' : '';
                    @endphp

                    <option value="{{ $clave_estado }}" {{ $selected }}>{{ $texto_estado }}</option>

                @endforeach
            </select>
            @error('estado') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        

        @php echo $boton_guardar; @endphp

    </form>
    <br>

@endsection
