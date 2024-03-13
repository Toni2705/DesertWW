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
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'dni' => 'required',
            'password' => 'required',
        ]);

        // Llamar a la función del modelo para buscar al usuario
        $usuario = Corredor::buscarUsuario($request->dni, $request->password);

        // Verificar si se encontró un usuario
        if ($usuario) {
            // Verificar el rol del usuario
            if ($usuario->rol === 'admin') {
                return redirect(url('/menuadmin'));
            } else {
                // Redireccionar al menú principal si el usuario no es un admin
                return redirect(url('/menuprincipal'));
            }
        } else {

            // Usuario no autenticado, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect(url('/'));
        }
    }
}
