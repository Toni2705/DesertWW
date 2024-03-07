<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function mostrarDatosEnVista()
    {
        // Llamar a la función del modelo para obtener los datos
        $datos = Carrera::obtenerTodosLosDatos();

        // Pasar los datos a la vista
        return view('carrerasAdmin', ['datos' => $datos]);
    }
    public function añadirCarreras()
    {
        return view('carrerasAdd');
    }
    public function editarCarrera($id)
    {
        $carrera = Carrera::findOrFail($id);
        // Pasar los datos de la carrera a la vista del formulario de edición
        return view('editarCarreras', compact('carrera'));
    }

    public function editarCarreras1(Request $request)
    {
        // Obtener los datos del formulario
        $datos = $request->all();
    
        // Llamar a la función del modelo para editar los datos
        $exito = Carrera::editarDatos($datos);
    
        if ($exito) {
            // La edición fue exitosa, redirigir a alguna parte
            return redirect()->route('mostrar-datos')->with('success', 'Los datos de la carrera se actualizaron correctamente.');
        } else {
            // Error al editar la carrera, manejar según sea necesario
            return back()->with('error', 'Hubo un error al actualizar los datos de la carrera.');
        }
    }

    public function agregarCarrera(Request $request)
    {
        // Validar los datos del formulario (puedes agregar las reglas de validación según tus necesidades)

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'desnivel' => 'required',
            'mapa' => 'required',
            'max_participantes' => 'required',
            'km' => 'required',
            'fecha_inicio' => 'required',
            'hora_inicio' => 'required',
            'salida' => 'required',
            'cartel' => 'required',
            'precio_patrocinar' => 'required',
            'precio_inscripcion' => 'required',
            'id_sponsor' => 'required',
        ]);

        // Obtener los datos del formulario
        $datos = $request->all();

        // Llamar a la función del modelo para agregar una nueva carrera
        $nuevaCarrera = Carrera::agregarCarrera($datos);

        // Redireccionar a alguna ruta después de agregar la carrera
        return redirect()->route('mostrar-datos')->with('success', 'La carrera se agregó correctamente.');
    }
}
