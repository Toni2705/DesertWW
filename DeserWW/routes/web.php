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
use App\Http\Controllers\CarreraController;

Route::get('/mostrar-datos-en-vista', [CarreraController::class, 'mostrarDatosEnVista'])->name('mostrar-datos');

Route::post('/editar-carreras', [CarreraController::class, 'editarCarreras1'])->name('editar-carreras');

Route::get('/carreras/{id}/editar', [CarreraController::class, 'editarCarrera'])->name('editar-carrera');