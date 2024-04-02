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
        return view('admin/corredoresAdmin', ['datos' => $datos]);
    }
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'dni' => 'required',
            'password' => 'required',
        ]);
        $hassed = hash('sha256',$request->password);
        // Llamar a la función del modelo para buscar al usuario
        $usuario = Corredor::buscarUsuario($request->dni, $hassed);

        // Verificar si se encontró un usuario
        if ($usuario) {
            // Verificar el rol del usuario
            if ($usuario->rol === 'admin') {
                return redirect(url('/menuadmin'));
            } else {
                // Redireccionar al menú principal si el usuario no es un admin
                return redirect()->route('mostrarMenuPrincipal');
            }
        } else {

            // Usuario no autenticado, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect(url('/login'));
        }
    }
    
    public function añadirCorredor()
    {
        return view('admin/register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'contrasena' => 'required',
            'direccion' => 'required',
            'nacimiento' => 'required',
            'nivel' => 'required',
            'numero_federado' => ($request->nivel === 'PRO') ? 'required' : '',
        ]);

        // Obtener los datos del formulario
        $datos = $request->all();

        // Llamar a la función del modelo para agregar un nuevo corredor
        $nuevoCorredor = Corredor::registrarCorredor($datos);

        // Redireccionar a alguna ruta después de agregar el corredor
        return redirect('/menuprincipal')->with('success', 'El corredor se agregó correctamente.');
    }

}
