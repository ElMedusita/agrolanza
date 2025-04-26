
@extends('adminlte::page')
@extends('layouts.app')


@section('title', 'Calculadora')

@section('content')
    <br>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Calculadora de dosis</h2>

        <div class="form-group">
            <label for="dosis">Dosis recomendada:</label>
            <input type="number" step="0.01" id="dosis" class="form-control" placeholder="Ingrese la dosis recomendada" value="1.05">
        </div>

        <div class="form-group">
            <label>Unidad de dosis:</label>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="%" class="form-check-input" id="unidad-porcentaje">
                        <label class="form-check-label" for="unidad-porcentaje">%</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="kg/hl" class="form-check-input" id="unidad-kg-hl">
                        <label class="form-check-label" for="unidad-kg-hl">kg/hl</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="g/hl" class="form-check-input" id="unidad-g-hl">
                        <label class="form-check-label" for="unidad-g-hl">g/hl</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="L/hl" class="form-check-input" id="unidad-L-hl">
                        <label class="form-check-label" for="unidad-L-hl">L/hl</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="ml/hl" class="form-check-input" id="unidad-ml-hl">
                        <label class="form-check-label" for="unidad-ml-hl">ml/hl</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="cc/hl" class="form-check-input" id="unidad-cc-hl">
                        <label class="form-check-label" for="unidad-cc-hl">cc/hl</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="cc/L" class="form-check-input" id="unidad-cc-L" checked>
                        <label class="form-check-label" for="unidad-cc-L">cc/L</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="ml/L" class="form-check-input" id="unidad-ml-L">
                        <label class="form-check-label" for="unidad-ml-L">ml/L</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="cc/ha" class="form-check-input" id="unidad-cc-ha">
                        <label class="form-check-label" for="unidad-cc-ha">cc/ha</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="L/ha" class="form-check-input" id="unidad-L-ha">
                        <label class="form-check-label" for="unidad-L-ha">L/ha</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="g/ha" class="form-check-input" id="unidad-g-ha">
                        <label class="form-check-label" for="unidad-g-ha">g/ha</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="unidad" value="kg/ha" class="form-check-input" id="unidad-kg-ha">
                        <label class="form-check-label" for="unidad-kg-ha">kg/ha</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="volumen-caldo">Volumen de caldo (L) por Ha (1.000 m):</label>
            <input type="number" step="0.01" id="volumen-caldo" class="form-control" placeholder="Ingrese el volumen de caldo por Ha" value="15.5">
        </div>

        <div class="form-group">
            <label for="volumen-deposito">Volumen del depósito o mochila (L):</label>
            <input type="number" step="0.01" id="volumen-deposito" class="form-control" placeholder="Ingrese el volumen del depósito o mochila" value="15">
        </div>

        <div class="form-group">
            <label for="cantidad-producto">Cantidad de producto:</label>
            <input type="text" id="cantidad-producto" class="form-control" readonly value="">
        </div>

        <p>
            <a href="{{ url('/fitosanitarios') }}" class="btn btn-secondary">Volver</a>
            <button id="calcular" class="btn btn-primary">Calcular</button>
        </p>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/calculadora/functions.js') }}"></script>

@endsection