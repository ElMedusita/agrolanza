<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\MaquinariaController;
use App\Models\Maquinaria;
use App\Http\Controllers\FitosanitarioController;
use App\Models\Fitosanitario;
use App\Http\Controllers\ClienteController;
use App\Models\Cliente;
use App\Http\Controllers\ParcelaController;
use App\Models\Parcela;
use App\Http\Controllers\ServicioController;
use App\Models\Servicio;
use App\Http\Controllers\ServicioUserController;
use App\Models\ServicioUser;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


  ##############
 ## Usuarios ##
##############

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/users'                , [UserController::class, 'listado'])   ->middleware(['auth', 'verified'])->name('users.listado');
    Route::get('/user/{id}'            , [UserController::class, 'mostrar'])   ->middleware(['auth', 'verified'])->name('users.mostrar');
    Route::get('/user/actualizar/{id}' , [UserController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('users.actualizar');
    Route::get('/user/eliminar/{id}'   , [UserController::class, 'eliminar'])  ->middleware(['auth', 'verified'])->name('users.eliminar');
    Route::get('/users/nuevo'          , [UserController::class, 'alta'])      ->middleware(['auth', 'verified'])->name('users.alta');
    Route::post('/users/nuevo'         , [UserController::class, 'almacenar']) ->middleware(['auth', 'verified'])->name('users.almacenar');

});


  #################
 ## Maquinarias ##
#################

Route::middleware(['auth', 'role:admin|auxiliar'])->group(function () {

    Route::get('/maquinarias'                , [MaquinariaController::class, 'listado'])   ->middleware(['auth', 'verified'])->name('maquinarias.listado');
    Route::get('/maquinaria/{id}'            , [MaquinariaController::class, 'mostrar'])   ->middleware(['auth', 'verified'])->name('maquinarias.mostrar');
    Route::get('/maquinaria/actualizar/{id}' , [MaquinariaController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('maquinarias.actualizar');
    Route::get('/maquinaria/eliminar/{id}'   , [MaquinariaController::class, 'eliminar'])  ->middleware(['auth', 'verified'])->name('maquinarias.eliminar');
    Route::get('/maquinarias/nuevo'          , [MaquinariaController::class, 'alta'])      ->middleware(['auth', 'verified'])->name('maquinarias.alta');
    Route::post('/maquinarias/nuevo'         , [MaquinariaController::class, 'almacenar']) ->middleware(['auth', 'verified'])->name('maquinarias.almacenar');

});


  ####################
 ## Fitosanitarios ##
####################

Route::middleware(['auth', 'role:admin|auxiliar'])->group(function () {

    Route::get('/fitosanitarios'                , [FitosanitarioController::class, 'listado'])   ->middleware(['auth', 'verified'])->name('fitosanitarios.listado');
    Route::get('/fitosanitario/{id}'            , [FitosanitarioController::class, 'mostrar'])   ->middleware(['auth', 'verified'])->name('fitosanitarios.mostrar');
    Route::get('/fitosanitario/actualizar/{id}' , [FitosanitarioController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('fitosanitarios.actualizar');
    Route::get('/fitosanitario/eliminar/{id}'   , [FitosanitarioController::class, 'eliminar'])  ->middleware(['auth', 'verified'])->name('fitosanitarios.eliminar');
    Route::get('/fitosanitarios/nuevo'          , [FitosanitarioController::class, 'alta'])      ->middleware(['auth', 'verified'])->name('fitosanitarios.alta');
    Route::post('/fitosanitarios/nuevo'         , [FitosanitarioController::class, 'almacenar']) ->middleware(['auth', 'verified'])->name('fitosanitarios.almacenar');

});


  ##############
 ## Clientes ##
##############

Route::middleware(['auth', 'role:admin|auxiliar'])->group(function () {

    Route::get('/clientes'                , [ClienteController::class, 'listado'])   ->middleware(['auth', 'verified'])->name('clientes.listado');
    Route::get('/cliente/{id}'            , [ClienteController::class, 'mostrar'])   ->middleware(['auth', 'verified'])->name('clientes.mostrar');
    Route::get('/cliente/actualizar/{id}' , [ClienteController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('clientes.actualizar');
    Route::get('/cliente/eliminar/{id}'   , [ClienteController::class, 'eliminar'])  ->middleware(['auth', 'verified'])->name('clientes.eliminar');
    Route::get('/clientes/nuevo'          , [ClienteController::class, 'alta'])      ->middleware(['auth', 'verified'])->name('clientes.alta');
    Route::post('/clientes/nuevo'         , [ClienteController::class, 'almacenar']) ->middleware(['auth', 'verified'])->name('clientes.almacenar');

});


  ##############
 ## Parcelas ##
##############

Route::middleware(['auth', 'role:admin|auxiliar'])->group(function () {

    Route::get('/parcelas'                , [ParcelaController::class, 'listado'])   ->middleware(['auth', 'verified'])->name('parcelas.listado');
    Route::get('/parcela/{id}'            , [ParcelaController::class, 'mostrar'])   ->middleware(['auth', 'verified'])->name('parcelas.mostrar');
    Route::get('/parcela/actualizar/{id}' , [ParcelaController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('parcelas.actualizar');
    Route::get('/parcela/eliminar/{id}'   , [ParcelaController::class, 'eliminar'])  ->middleware(['auth', 'verified'])->name('parcelas.eliminar');
    Route::get('/parcelas/nuevo'          , [ParcelaController::class, 'alta'])      ->middleware(['auth', 'verified'])->name('parcelas.alta');
    Route::post('/parcelas/nuevo'         , [ParcelaController::class, 'almacenar']) ->middleware(['auth', 'verified'])->name('parcelas.almacenar');

});


  ###############
 ## Servicios ##
###############

Route::middleware(['auth', 'role:admin|auxiliar'])->group(function () {

    Route::get('/servicios'                , [ServicioController::class, 'listado'])   ->middleware(['auth', 'verified'])->name('servicios.listado');
    Route::get('/servicio/{id}'            , [ServicioController::class, 'mostrar'])   ->middleware(['auth', 'verified'])->name('servicios.mostrar');
    Route::get('/servicio/actualizar/{id}' , [ServicioController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('servicios.actualizar');
    Route::get('/servicio/eliminar/{id}'   , [ServicioController::class, 'eliminar'])  ->middleware(['auth', 'verified'])->name('servicios.eliminar');
    Route::get('/servicios/nuevo'          , [ServicioController::class, 'alta'])      ->middleware(['auth', 'verified'])->name('servicios.alta');
    Route::post('/servicios/nuevo'         , [ServicioController::class, 'almacenar']) ->middleware(['auth', 'verified'])->name('servicios.almacenar');

});

  ###########################
 ## Servicios y empleados ##
###########################

Route::middleware(['auth', 'role:admin|auxiliar'])->group(function () {

    Route::get('/servicios/{id}/users', [ServicioUserController::class, 'index'])->name('servicio.users');

});

require __DIR__.'/auth.php';
