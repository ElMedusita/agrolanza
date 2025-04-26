<?php

use Illuminate\Support\Facades\Validator;

function getFitosanitarioValidationRules($validacion_tipo, $validacion_estado): array {
    return [
        'nombre'                  => 'required|max:20',
        'marca'                   => 'required|max:20',
        'numero_registro'         => 'required|max:14',
        'tipo'                    => 'required|in:' . $validacion_tipo,
        'estado'                  => 'required|in:' . $validacion_estado,
        'descripcion'             => 'required|max:200',
        'entidad_vendedora'       => 'required|max:40',
        'materia_activa'          => 'required|max:30',
        'cantidad_materia_activa' => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
        'dosis_maxima'            => 'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/',
        'plazo_seguridad'         => 'required|integer|max:1000',
        'observaciones'           => 'nullable|max:200',
    ];
}

beforeEach(function () {
    $this->rules = getFitosanitarioValidationRules('HE,IN,FU,BA,NE,AC', 'PV,PP,VV');
});

it('fails when nombre is missing or too long', function () {
    expect(Validator::make(['nombre' => null], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['nombre' => str_repeat('a', 21)], $this->rules)->fails())->toBeTrue();
});

it('fails when marca is missing or too long', function () {
    expect(Validator::make(['marca' => null], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['marca' => str_repeat('b', 21)], $this->rules)->fails())->toBeTrue();
});

it('fails when numero_registro is missing or too long', function () {
    expect(Validator::make(['numero_registro' => null], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['numero_registro' => str_repeat('c', 15)], $this->rules)->fails())->toBeTrue();
});

it('fails when descripcion is missing or too long', function () {
    expect(Validator::make(['descripcion' => null], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['descripcion' => str_repeat('d', 201)], $this->rules)->fails())->toBeTrue();
});

it('fails when entidad_vendedora is missing or too long', function () {
    expect(Validator::make(['entidad_vendedora' => null], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['entidad_vendedora' => str_repeat('e', 41)], $this->rules)->fails())->toBeTrue();
});

it('fails when materia_activa is missing or too long', function () {
    expect(Validator::make(['materia_activa' => null], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['materia_activa' => str_repeat('m', 31)], $this->rules)->fails())->toBeTrue();
});

it('fails with incorrect cantidad_materia_activa format', function () {
    expect(Validator::make(['cantidad_materia_activa' => '12.345'], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['cantidad_materia_activa' => 'abc'], $this->rules)->fails())->toBeTrue();
});

it('fails with incorrect dosis_maxima format', function () {
    expect(Validator::make(['dosis_maxima' => '123456'], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['dosis_maxima' => '0.123'], $this->rules)->fails())->toBeTrue();
});

it('fails when plazo_seguridad exceeds max or is not integer', function () {
    expect(Validator::make(['plazo_seguridad' => 1001], $this->rules)->fails())->toBeTrue();
    expect(Validator::make(['plazo_seguridad' => 'notanumber'], $this->rules)->fails())->toBeTrue();
});

it('passes when observaciones is null or valid', function () {
    $observacionesRule = ['observaciones' => $this->rules['observaciones']];

    expect(Validator::make(['observaciones' => null], $observacionesRule)->passes())->toBeTrue();
    expect(Validator::make(['observaciones' => str_repeat('o', 200)], $observacionesRule)->passes())->toBeTrue();
});

it('fails when observaciones exceeds 200 characters', function () {
    expect(Validator::make(['observaciones' => str_repeat('x', 201)], $this->rules)->fails())->toBeTrue();
});

it('passes validation with valid fitosanitario data', function () {
    $data = [
        'nombre'                  => 'Herbicida X',
        'marca'                   => 'MarcaTest',
        'numero_registro'         => 'ABC12345678901',
        'tipo'                    => 'HE',
        'estado'                  => 'PV',
        'descripcion'             => 'Producto eficaz contra malas hierbas.',
        'entidad_vendedora'       => 'ProveedorTest',
        'materia_activa'          => 'Glifosato',
        'cantidad_materia_activa' => 120.5,
        'dosis_maxima'            => 3.75,
        'plazo_seguridad'         => 30,
        'observaciones'           => 'Usar con precaución.',
    ];

    $validator = Validator::make($data, $this->rules);

    expect($validator->passes())->toBeTrue();
});
