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

        // Llamar a la función del modelo para buscar al usuario
        $usuario = Corredor::buscarUsuario($request->dni, $request->password);

        // Verificar si se encontró un usuario
        if ($usuario) {
            // Verificar el rol del usuario
            if ($usuario->rol === 'admin') {
                return redirect(url('admin/menuadmin'));
            } else {
                // Redireccionar al menú principal si el usuario no es un admin
                return redirect(url('admin/menuprincipal'));
            }
        } else {

            // Usuario no autenticado, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect(url('/'));
        }
    }

    public function register(Request $request)
    {
        // register
        // Validar los datos del formulario (puedes agregar las reglas de validación según tus necesidades)

        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'contraseña' => 'required',
            'direccion' => 'required',
            'nacimiento' => 'required',
            'nivel' => 'required',
            'socio' => 'required',
            'numero_federado' => ($request->nivel === 'PRO') ? 'required' : '',
            'id_seguro' => 'required'
        ]);

        // Obtener los datos del formulario
        $datos = $request->all();

        // Llamar a la función del modelo para agregar una nueva carrera
        Corredor::registrarCorredor($datos);

        // Redireccionar a alguna ruta después de agregar el corredor
        return redirect()->route('menuprincipal')->with('success', 'El corredor se agregó correctamente.');
    }
}
