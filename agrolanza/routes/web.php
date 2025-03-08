<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


  ##############
 ## Usuarios ##
##############

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/users'                , [UserController::class, 'listado'])->middleware(['auth', 'verified'])->name('users.listado');
    Route::get('/user/{id}'            , [UserController::class, 'mostrar'])->middleware(['auth', 'verified'])->name('users.mostrar');
    Route::get('/user/actualizar/{id}' , [UserController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('users.actualizar');
    Route::get('/user/eliminar/{id}'   , [UserController::class, 'eliminar'])->middleware(['auth', 'verified'])->name('users.eliminar');
    Route::get('/users/nuevo'          , [UserController::class, 'alta'])->middleware(['auth', 'verified'])->name('users.alta');
    Route::post('/users/nuevo'         , [UserController::class, 'almacenar'])->middleware(['auth', 'verified'])->name('users.almacenar');

});

require __DIR__.'/auth.php';
