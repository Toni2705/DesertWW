<?php

namespace App\Http\Controllers;

use App\Models\Seguro;
use Illuminate\Http\Request;

class SeguroController extends Controller
{
    public function mostrarDatosEnVista()
    {
        // Llamar a la función del modelo para obtener los datos
        $datos = Seguro::obtenerTodosLosDatos();

        // Pasar los datos a la vista
        return view('segurosAdmin', ['datos' => $datos]);
    }
    public function añadirSeguros()
    {
        return view('segurosAdd');
    }
    public function editarSeguro($id)
    {
        $seguro = Seguro::findOrFail($id);
        // Pasar los datos del segurp a la vista del formulario de edición
        return view('editarSeguros', compact('seguro'));
    }

    public function editarSeguros(Request $request)
    {
        // Obtener los datos del formulario
        $datos = $request->all();

        // Llamar a la función del modelo para editar los datos
        $exito = Seguro::editarDatos($datos);

        if ($exito) {
            // La edición fue exitosa, redirigir a alguna parte
            return redirect()->route('mostrar-seguros')->with('success', 'Los datos del seguro se actualizaron correctamente.');
        } else {
            // Error al editar el seguro, manejar según sea necesario
            return back()->with('error', 'Hubo un error al actualizar los datos del seguro.');
        }
    }

    public function agregarSeguro(Request $request)
    {
        // Validar los datos del formulario (puedes agregar las reglas de validación según tus necesidades)

        $request->validate([
            'nombre' => 'required',
            'CIF' => 'required',
            'direccion' => 'required',
            'precio' => 'required',
        ]);

        // Obtener los datos del formulario
        $datos = $request->all();

        // Llamar a la función del modelo para agregar un nuevo seguro
        $nuevoSeguro = Seguro::agregarSeguro($datos);

        // Redireccionar a alguna ruta después de agregar el seguro
        return redirect()->route('mostrar-seguros')->with('success', 'El seguro se agregó correctamente.');
    }
}
