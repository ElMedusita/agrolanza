<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

function getValidationRules($request = [])
{
    return [
        'identificacion' => ['required', 'regex:/^([X-Z])?\d{8}[A-Z]$/', 'unique:users,identificacion,' . ($request['id'] ?? '')],
        'name' => 'required|string|max:50',
        'apellidos' => 'required|string|max:50',
        'email' => 'required|string|email|max:255|unique:users,email,' . ($request['id'] ?? ''),
        'telefono' => ['required', 'regex:/^\d{9}$/'],
        'direccion' => 'required|string|max:255',
        'localidad' => 'required|string|max:100',
        'codigo_postal' => 'required|regex:/^\d{5}$/',
        'iban' => 'required|regex:/^ES[0-9]{22}$/',
        'fecha_nacimiento' => 'required|date|before:' . Carbon::now()->subYears(18)->toDateString(),
        'password' => empty($request['id']) ? 'required' : (!empty($request['password']) ? 'string' : ''),
        'confirm_password' => !empty($request['password']) ? 'required|same:password' : '',
    ];
}

it('passes validation with valid data', function () {
    $validData = [
        'identificacion' => '12345678Z',
        'name' => 'Juan',
        'apellidos' => 'Pérez',
        'email' => 'juan@example.com',
        'telefono' => '612345678',
        'direccion' => 'Calle Falsa 123',
        'localidad' => 'Madrid',
        'codigo_postal' => '28080',
        'iban' => 'ES7620770024003102575766',
        'fecha_nacimiento' => Carbon::now()->subYears(20)->toDateString(),
        'password' => 'secret123',
        'confirm_password' => 'secret123',
    ];

    $validator = Validator::make($validData, getValidationRules());
    expect($validator->passes())->toBeTrue();
});

it('fails validation with invalid identificacion', function () {
    $data = ['identificacion' => '1234A'];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('identificacion'))->toBeTrue();
});

it('fails when user is underage', function () {
    $data = ['fecha_nacimiento' => Carbon::now()->subYears(17)->toDateString()];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('fecha_nacimiento'))->toBeTrue();
});

it('fails if confirm_password does not match', function () {
    $data = [
        'password' => 'secret123',
        'confirm_password' => 'notmatching',
    ];
    $validator = Validator::make($data, getValidationRules($data));
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('confirm_password'))->toBeTrue();
});

it('fails validation with invalid name (too long)', function () {
    $data = ['name' => str_repeat('a', 51)];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('name'))->toBeTrue();
});

it('fails validation with invalid apellidos (empty)', function () {
    $data = ['apellidos' => ''];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('apellidos'))->toBeTrue();
});

it('fails validation with invalid email format', function () {
    $data = ['email' => 'invalid-email'];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('email'))->toBeTrue();
});

it('fails validation with invalid telefono', function () {
    $data = ['telefono' => '12345'];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('telefono'))->toBeTrue();
});

it('fails validation with invalid direccion (too long)', function () {
    $data = ['direccion' => str_repeat('b', 256)];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('direccion'))->toBeTrue();
});

it('fails validation with invalid localidad (too long)', function () {
    $data = ['localidad' => str_repeat('c', 101)];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('localidad'))->toBeTrue();
});

it('fails validation with invalid codigo_postal', function () {
    $data = ['codigo_postal' => '123'];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('codigo_postal'))->toBeTrue();
});

it('fails validation with invalid IBAN', function () {
    $data = ['iban' => 'ES123456'];
    $validator = Validator::make($data, getValidationRules());
    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('iban'))->toBeTrue();
});

it('passes validation without password when updating and password not set', function () {
    $data = [
        'id' => 1,
        'identificacion' => '12345678Z',
        'name' => 'Ana',
        'apellidos' => 'López',
        'email' => 'ana@example.com',
        'telefono' => '612345678',
        'direccion' => 'Calle Nueva 45',
        'localidad' => 'Barcelona',
        'codigo_postal' => '08001',
        'iban' => 'ES7620770024003102575766',
        'fecha_nacimiento' => Carbon::now()->subYears(25)->toDateString(),
    ];
    $validator = Validator::make($data, getValidationRules($data));
    expect($validator->passes())->toBeTrue();
});