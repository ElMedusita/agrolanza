<?php

use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\Parcela;

function getServicioValidationRules($validacion_tipo_servicio, $validacion_metodo_pago, $validacion_estado) {
    return [
        'tipo_servicio'   => 'required|in:' . $validacion_tipo_servicio,
        'descripcion'     => 'required|string|max:60',
        'fecha_servicio'  => 'required|date',
        'hora_servicio'   => 'required',
        'duracion'        => 'required|integer',
        'presupuesto'     => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
        'metodo_pago'     => 'required|in:' . $validacion_metodo_pago,
        'estado'          => 'required|in:' . $validacion_estado,
        'id_parcela'      => 'required|exists:parcelas,id',
    ];
}

it('passes validation with valid servicio data', function () {
    $cliente = Cliente::create([
    'identificacion' => '67890123K',
    'nombre' => 'Fernando',
    'apellidos' => 'Gómez Serrano',
    'email' => 'fernando@example.com',
    'telefono' => '692345678',
    'codigo_postal' => '28011',
    'ip_alta' => '192.168.1.21',
    'ip_ult_mod' => '192.168.1.22',
    'created_at' => now(),
    ]);
    $parcela = Parcela::create([
        'id_cliente' => $cliente->id,
        'referencia_catastral' => '1234567890ABCDEF1234',
        'superficie' => 1000,
        'latitud' => 40.4168,
        'longitud' => -3.7038,
        'direccion' => 'Calle Falsa 123',
        'localidad' => 'Teguise',
        'codigo_postal' => '35530',
    ]);
    $data = [
        'tipo_servicio'   => 'CP',
        'descripcion'     => 'Control de plagas en parcela',
        'fecha_servicio'  => now()->toDateString(),
        'hora_servicio'   => '10:00',
        'duracion'        => 60,
        'presupuesto'     => 150.50,
        'metodo_pago'     => 'TR',
        'estado'          => 'N',
        'id_parcela'      => 1,
    ];
    $rules = getServicioValidationRules('CP,CM,SC,SS,CF,RF', 'EF,TA,TR', 'P,N');

    $validator = Validator::make($data, $rules);
    expect($validator->passes())->toBeTrue();
});

it('fails with invalid tipo_servicio', function () {
    $data = ['tipo_servicio' => 'invalid'];
    $validator = Validator::make($data, getServicioValidationRules('riego,poda', 'efectivo', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('tipo_servicio'))->toBeTrue();
});

it('fails with too long descripcion', function () {
    $data = ['descripcion' => str_repeat('x', 61)];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('descripcion'))->toBeTrue();
});

it('fails with invalid fecha_servicio', function () {
    $data = ['fecha_servicio' => 'invalid-date'];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('fecha_servicio'))->toBeTrue();
});

it('fails with missing hora_servicio', function () {
    $data = [];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('hora_servicio'))->toBeTrue();
});

it('fails with non-integer duracion', function () {
    $data = ['duracion' => 'una hora'];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('duracion'))->toBeTrue();
});

it('fails with invalid presupuesto format', function () {
    $data = ['presupuesto' => '1234.567'];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('presupuesto'))->toBeTrue();
});

it('fails with invalid metodo_pago', function () {
    $data = ['metodo_pago' => 'bitcoin'];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo,transferencia', 'pendiente'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('metodo_pago'))->toBeTrue();
});

it('fails with invalid estado', function () {
    $data = ['estado' => 'en_proceso'];
    $validator = Validator::make($data, getServicioValidationRules('riego', 'efectivo', 'pendiente,completado'));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('estado'))->toBeTrue();
});

it('fails when id_parcela does not exist', function () {
    $data = ['id_parcela' => 999];
    $rules = getServicioValidationRules('CP', 'EF', 'N');

    $validator = Validator::make($data, $rules);

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('id_parcela'))->toBeTrue();
});


