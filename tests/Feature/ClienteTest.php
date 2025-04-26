<?php

use Illuminate\Support\Facades\Validator;

beforeEach(function () {
    $this->rules = [
        'identificacion' => ['required', 'regex:/^([X-Z])?\d{8}[A-Z]$/', 'unique:clientes,identificacion'],
        'nombre'         => 'required|string|max:50',
        'apellidos'      => 'required|string|max:50',
        'email'          => 'nullable|string|email|max:255|unique:users,email',
        'telefono'       => 'required|string|size:9|regex:/[0-9]{9}/',
        'codigo_postal'  => 'required|regex:/^\d{5}$/',
    ];
});

it('passes validation with valid cliente data', function () {
    $data = [
        'identificacion' => '12345678Z',
        'nombre'         => 'Juan',
        'apellidos'      => 'Pérez',
        'email'          => 'juan@example.com',
        'telefono'       => '123456789',
        'codigo_postal'  => '28080',
    ];

    $validator = Validator::make($data, $this->rules);
    expect($validator->passes())->toBeTrue();
});

it('fails when identificacion is missing or invalid', function () {
    expect(Validator::make(['identificacion' => null], ['identificacion' => $this->rules['identificacion']])->fails())->toBeTrue();
    expect(Validator::make(['identificacion' => '123456789'], ['identificacion' => $this->rules['identificacion']])->fails())->toBeTrue();
});

it('fails when nombre or apellidos are too long or missing', function () {
    expect(Validator::make(['nombre' => str_repeat('a', 51)], ['nombre' => $this->rules['nombre']])->fails())->toBeTrue();
    expect(Validator::make(['apellidos' => str_repeat('b', 51)], ['apellidos' => $this->rules['apellidos']])->fails())->toBeTrue();
    expect(Validator::make(['nombre' => null], ['nombre' => $this->rules['nombre']])->fails())->toBeTrue();
    expect(Validator::make(['apellidos' => null], ['apellidos' => $this->rules['apellidos']])->fails())->toBeTrue();
});

it('passes when email is null or valid and fails when invalid', function () {
    expect(Validator::make(['email' => null], ['email' => $this->rules['email']])->passes())->toBeTrue();
    expect(Validator::make(['email' => 'user@example.com'], ['email' => $this->rules['email']])->passes())->toBeTrue();
    expect(Validator::make(['email' => 'invalid-email'], ['email' => $this->rules['email']])->fails())->toBeTrue();
});

it('fails when telefono is invalid', function () {
    expect(Validator::make(['telefono' => '12345678'], ['telefono' => $this->rules['telefono']])->fails())->toBeTrue();
    expect(Validator::make(['telefono' => '1234567890'], ['telefono' => $this->rules['telefono']])->fails())->toBeTrue();
    expect(Validator::make(['telefono' => 'abcdefghj'], ['telefono' => $this->rules['telefono']])->fails())->toBeTrue();
});

it('fails when codigo_postal is missing or invalid', function () {
    expect(Validator::make(['codigo_postal' => null], ['codigo_postal' => $this->rules['codigo_postal']])->fails())->toBeTrue();
    expect(Validator::make(['codigo_postal' => '1234'], ['codigo_postal' => $this->rules['codigo_postal']])->fails())->toBeTrue();
    expect(Validator::make(['codigo_postal' => 'ABCDE'], ['codigo_postal' => $this->rules['codigo_postal']])->fails())->toBeTrue();
});

