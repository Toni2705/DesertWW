<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function mostrarDatosEnVista()
    {
        // Llamar a la función del modelo para obtener los datos
        $datos = Sponsor::obtenerTodosLosDatos();

        // Pasar los datos a la vista
        return view('sponsorAdmin', ['datos' => $datos]);
    }
    public function añadirSponsor()
    {
        return view('SponsorAdd');
    }
    public function editarSponsor($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        // Pasar los datos de la carrera a la vista del formulario de edición
        return view('editarSponsor', compact('sponsor'));
    }

    public function editarSponsors(Request $request)
    {
        // Obtener los datos del formulario
        $datos = $request->all();
    
        // Llamar a la función del modelo para editar los datos
        $exito = Sponsor::editarDatos($datos);
    
        if ($exito) {
            // La edición fue exitosa, redirigir a alguna parte
            return redirect()->route('mostrar-sponsor')->with('success', 'Los datos de la carrera se actualizaron correctamente.');
        } else {
            // Error al editar la carrera, manejar según sea necesario
            return back()->with('error', 'Hubo un error al actualizar los datos de la carrera.');
        }
    }

    public function agregarSponsor(Request $request)
{
    // Validar los datos del formulario (puedes agregar las reglas de validación según tus necesidades)

    $request->validate([
        'nombre' => 'required',
        'CIF' => 'required',
        'logo' => 'required',
        'direccion' => 'required',
        'principal' => 'required'
    ]);

    // Obtener los datos del formulario
    $datos = $request->all();

    // Llamar a la función del modelo para agregar un nuevo sponsor
    $nuevoSponsor = Sponsor::agregarSponsor($datos);

    // Redireccionar a alguna ruta después de agregar el sponsor
    return redirect()->route('mostrar-sponsor')->with('success', 'El sponsor se agregó correctamente.');
}
}
