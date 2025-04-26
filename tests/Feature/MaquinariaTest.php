<?php

use Illuminate\Support\Facades\Validator;

function getMaquinariaValidationRules(): array {
    return [
        'numero_serie' => 'required|regex:/^[A-Za-z0-9]{15}$/',
        'matricula'    => 'required|regex:/^[A-Za-z0-9]{8}$/',
        'marca'        => 'required|max:20',
        'descripcion'  => 'required|max:200',
    ];
}

it('passes validation with valid maquinaria data', function () {
    $data = [
        'numero_serie' => 'ABC123DEF456GHI',
        'matricula'    => '1234XYZ8',
        'marca'        => 'John Deere',
        'descripcion'  => 'Tractor de última generación para trabajo agrícola intensivo',
    ];

    $validator = Validator::make($data, getMaquinariaValidationRules());
    expect($validator->passes())->toBeTrue();
});

it('fails when numero_serie is missing or invalid', function () {
    $invalid = [
        'numero_serie' => 'SHORTSERIE',
        'matricula'    => '1234XYZ8',
        'marca'        => 'John Deere',
        'descripcion'  => 'Tractor agrícola',
    ];

    $missing = [
        'matricula'   => '1234XYZ8',
        'marca'       => 'John Deere',
        'descripcion' => 'Tractor agrícola',
    ];

    $v1 = Validator::make($invalid, getMaquinariaValidationRules());
    $v2 = Validator::make($missing, getMaquinariaValidationRules());

    expect($v1->fails())->toBeTrue();
    expect($v1->errors()->has('numero_serie'))->toBeTrue();

    expect($v2->fails())->toBeTrue();
    expect($v2->errors()->has('numero_serie'))->toBeTrue();
});

it('fails when matricula is missing or invalid', function () {
    $invalid = [
        'numero_serie' => 'ABC123DEF456GHI',
        'matricula'    => '12AB',
        'marca'        => 'Kubota',
        'descripcion'  => 'Excavadora pequeña',
    ];

    $missing = [
        'numero_serie' => 'ABC123DEF456GHI',
        'marca'        => 'Kubota',
        'descripcion'  => 'Excavadora pequeña',
    ];

    $v1 = Validator::make($invalid, getMaquinariaValidationRules());
    $v2 = Validator::make($missing, getMaquinariaValidationRules());

    expect($v1->fails())->toBeTrue();
    expect($v1->errors()->has('matricula'))->toBeTrue();

    expect($v2->fails())->toBeTrue();
    expect($v2->errors()->has('matricula'))->toBeTrue();
});

it('fails when marca is too long or missing', function () {
    $longMarca = str_repeat('A', 21);

    $invalid = [
        'numero_serie' => 'ABC123DEF456GHI',
        'matricula'    => '1234XYZ8',
        'marca'        => $longMarca,
        'descripcion'  => 'Maquinaria pesada',
    ];

    $missing = [
        'numero_serie' => 'ABC123DEF456GHI',
        'matricula'    => '1234XYZ8',
        'descripcion'  => 'Maquinaria pesada',
    ];

    $v1 = Validator::make($invalid, getMaquinariaValidationRules());
    $v2 = Validator::make($missing, getMaquinariaValidationRules());

    expect($v1->fails())->toBeTrue();
    expect($v1->errors()->has('marca'))->toBeTrue();

    expect($v2->fails())->toBeTrue();
    expect($v2->errors()->has('marca'))->toBeTrue();
});

it('fails when descripcion is too long or missing', function () {
    $longDescripcion = str_repeat('a', 201);

    $invalid = [
        'numero_serie' => 'ABC123DEF456GHI',
        'matricula'    => '1234XYZ8',
        'marca'        => 'Kubota',
        'descripcion'  => $longDescripcion,
    ];

    $missing = [
        'numero_serie' => 'ABC123DEF456GHI',
        'matricula'    => '1234XYZ8',
        'marca'        => 'Kubota',
    ];

    $v1 = Validator::make($invalid, getMaquinariaValidationRules());
    $v2 = Validator::make($missing, getMaquinariaValidationRules());

    expect($v1->fails())->toBeTrue();
    expect($v1->errors()->has('descripcion'))->toBeTrue();

    expect($v2->fails())->toBeTrue();
    expect($v2->errors()->has('descripcion'))->toBeTrue();
});
