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
    return view('loginAdmin');
});

use App\Http\Controllers\SeguroController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CorredorController;
use App\Http\Controllers\SponsorController;
use App\Models\Corredor;

//ADMIN

Route::get('/mostrar-datos-en-vista', [CarreraController::class, 'mostrarDatosEnVista'])->name('mostrar-datos');

Route::post('/editar-carreras', [CarreraController::class, 'editarCarreras1'])->name('editar-carreras');

Route::get('/carreras/{id}/editar', [CarreraController::class, 'editarCarrera'])->name('editar-carrera');

Route::get('/agregar-carrera', [CarreraController::class, 'añadirCarreras'])->name('agregar-carrera');

Route::post('/agregar-carrera', [CarreraController::class, 'agregarCarrera'])->name('guardar-carrera');

Route::get('/carrera/{id}', [CarreraController::class, 'carreraInfo'])->name('carrera-info');

// CORREDORES
Route::get('/mostrar-corredores', [CorredorController::class, 'mostrarDatosEnVista'])->name('mostrar-corredores');
// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', function () {
    return view('admin/loginAdmin');
});

// Ruta para procesar el formulario de inicio de sesión
Route::post('/login', [CorredorController::class, 'login'])->name('login');

// Ruta para el menú principal
Route::get('/', [CarreraController::class, 'mostrarMenuPrincipal'])->name('mostrarMenuPrincipal');
Route::get('/menuprincipal', function () {
    return view('principal/menuprincipal');
})->name('menuprincipal');

// Ruta para el menú del administrador
Route::get('/menuadmin', function () {
    return view('admin/menuadmin');
})->name('menuadmin');

// SEGUROS
Route::get('/mostrar-seguros', [SeguroController::class, 'mostrarDatosEnVista'])->name('mostrar-seguros');

Route::post('/editar-seguros', [SeguroController::class, 'editarSeguros'])->name('editar-seguros');

Route::get('/seguros/{id}/editar', [SeguroController::class, 'editarSeguro'])->name('editar-seguro');

Route::get('/agregar-seguro', [SeguroController::class, 'añadirSeguros'])->name('agregar-seguro');

Route::post('/agregar-seguro', [SeguroController::class, 'agregarSeguro'])->name('guardar-seguro');

//Sponsors
Route::get('/mostrar-sponsor', [SponsorController::class, 'mostrarDatosEnVista'])->name('mostrar-sponsor');

Route::get('/añadir-sponsor', [SponsorController::class, 'añadirSponsor'])->name('añadir-sponsor');

Route::post('/añadir-sponsor', [SponsorController::class, 'agregarSponsor'])->name('guardar-sponsor');

Route::get('/editar-sponsor/{id}', [SponsorController::class, 'editarSponsor'])->name('editar-sponsor');

Route::post('/editar-sponsor', [SponsorController::class, 'editarSponsors'])->name('actualizar-sponsor');

// REGISTER
// Ruta para mostrar el formulario de inicio de sesión
Route::get('/register', [CorredorController::class, 'añadirCorredors'])->name('agregar-corredor');

Route::post('/register', [CorredorController::class, 'register'])->name('guardar-corredor');

Route::get('/register', function () {
    return view('register');
});