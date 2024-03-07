<?php

namespace App\Http\Controllers;

use App\Models\Corredor;
use Illuminate\Http\Request;

class CorredorController extends Controller
{
    public function mostrarDatosEnVista()
    {
        // Llamar a la función del modelo para obtener los datos
        $datos = Corredor::obtenerTodosLosDatos();

        // Pasar los datos a la vista
        return view('corredoresAdmin', ['datos' => $datos]);
    }
}
