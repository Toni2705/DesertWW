<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('menuadmin');
});

use App\Http\Controllers\SeguroController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CorredorController;

Route::get('/mostrar-datos-en-vista', [CarreraController::class, 'mostrarDatosEnVista'])->name('mostrar-datos');

Route::post('/editar-carreras', [CarreraController::class, 'editarCarreras1'])->name('editar-carreras');

Route::get('/carreras/{id}/editar', [CarreraController::class, 'editarCarrera'])->name('editar-carrera');

Route::get('/agregar-carrera', [CarreraController::class, 'añadirCarreras'])->name('agregar-carrera');

Route::post('/agregar-carrera', [CarreraController::class, 'agregarCarrera'])->name('guardar-carrera');

// CORREDORES
Route::get('/mostrar-corredores', [CorredorController::class, 'mostrarDatosEnVista'])->name('mostrar-corredores');

// SEGUROS
Route::get('/mostrar-seguros', [SeguroController::class, 'mostrarDatosEnVista'])->name('mostrar-seguros');

Route::post('/editar-seguros', [SeguroController::class, 'editarSeguros'])->name('editar-seguros');

Route::get('/seguros/{id}/editar', [SeguroController::class, 'editarSeguro'])->name('editar-seguro');

Route::get('/agregar-seguro', [SeguroController::class, 'añadirSeguros'])->name('agregar-seguro');

Route::post('/agregar-seguro', [SeguroController::class, 'agregarSeguro'])->name('guardar-seguro');