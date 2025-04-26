<?php

use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;

function getParcelaValidationRules(): array {
    return [
        'id_cliente'            => 'required',
        'referencia_catastral' => ['required', 'regex:/^[A-Za-z0-9]{20}$/'],
        'superficie'           => 'required|integer|max:10000000',
        'latitud'              => 'required|numeric',
        'longitud'             => 'required|numeric',
    ];
}

it('passes validation with valid parcela data', function () {
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

    $data = [
        'id_cliente' => $cliente->id,
        'referencia_catastral' => 'ABCD1234EFGH5678IJKL',
        'superficie' => 5000,
        'latitud' => 28.123456,
        'longitud' => -15.654321,
    ];

    $validator = Validator::make($data, getParcelaValidationRules());
    expect($validator->passes())->toBeTrue();
});

it('fails when id_cliente is missing', function () {
    $data = [
        'referencia_catastral' => 'ABCD1234EFGH5678IJKL',
        'superficie' => 5000,
        'latitud' => 28.123456,
        'longitud' => -15.654321,
    ];

    $validator = Validator::make($data, getParcelaValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('id_cliente'))->toBeTrue();
});

it('fails when referencia_catastral is invalid', function () {
    $data = [
        'id_cliente' => 1,
        'referencia_catastral' => 'INVALID123', // menos de 20 caracteres
        'superficie' => 5000,
        'latitud' => 28.123456,
        'longitud' => -15.654321,
    ];

    $validator = Validator::make($data, getParcelaValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('referencia_catastral'))->toBeTrue();
});

it('fails when superficie is not an integer or too large', function () {
    $data1 = [
        'id_cliente' => 1,
        'referencia_catastral' => 'ABCD1234EFGH5678IJKL',
        'superficie' => 'large', // no es entero
        'latitud' => 28.123456,
        'longitud' => -15.654321,
    ];

    $data2 = [
        'id_cliente' => 1,
        'referencia_catastral' => 'ABCD1234EFGH5678IJKL',
        'superficie' => 10000001, // sobrepasa el máximo
        'latitud' => 28.123456,
        'longitud' => -15.654321,
    ];

    $validator1 = Validator::make($data1, getParcelaValidationRules());
    $validator2 = Validator::make($data2, getParcelaValidationRules());

    expect($validator1->fails())->toBeTrue();
    expect($validator1->errors()->has('superficie'))->toBeTrue();

    expect($validator2->fails())->toBeTrue();
    expect($validator2->errors()->has('superficie'))->toBeTrue();
});

it('fails when latitud or longitud are missing or not numeric', function () {
    $base = [
        'id_cliente' => 1,
        'referencia_catastral' => 'ABCD1234EFGH5678IJKL',
        'superficie' => 5000,
    ];

    $invalidLat = array_merge($base, ['latitud' => 'no', 'longitud' => -15.654321]);
    $invalidLng = array_merge($base, ['latitud' => 28.123456, 'longitud' => null]);

    $v1 = Validator::make($invalidLat, getParcelaValidationRules());
    $v2 = Validator::make($invalidLng, getParcelaValidationRules());

    expect($v1->fails())->toBeTrue();
    expect($v1->errors()->has('latitud'))->toBeTrue();

    expect($v2->fails())->toBeTrue();
    expect($v2->errors()->has('longitud'))->toBeTrue();
});

