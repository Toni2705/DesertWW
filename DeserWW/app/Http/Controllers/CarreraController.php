<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Seguro;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\VarDumper\VarDumper;

class CarreraController extends Controller
{
    
    public function mostrarMenuPrincipal()
    {
        // Obtener la próxima carrera
        $proximaCarrera = Carrera::where('fecha_inicio', '>', Carbon::now())
                                  ->orderBy('fecha_inicio', 'asc')
                                  ->first();
        // Obtener todas las carreras que comienzan en o después de la fecha actual
        $datos = Carrera::where('fecha_inicio', '>=', Carbon::today())
        ->orderBy('fecha_inicio', 'asc')
        ->get();
        $sponsors = Sponsor::sponsorsPrincipales();
        // Pasar los datos a la vista
        return view('principal/menuprincipal', [
            'proximaCarrera' => $proximaCarrera,
            'datos' => $datos,
            'sponsors'=> $sponsors
        ]);
    }
    public function carreraInfo($id)
    {
        // Buscar la carrera por su ID
        $carrera = Carrera::find($id);

        // Verificar si se encontró la carrera
        if ($carrera) {
            $seguros = Seguro::obtenerTodosLosDatos();
            // Retornar la vista con los datos de la carrera
            return view('principal/carreraInfo', ['carrera' => $carrera],['seguros'=> $seguros]);
        } else {
            // Retornar una respuesta en caso de que la carrera no se encuentre
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }
    }
    public function mostrarDatosEnVista()
    {
        // Llamar a la función del modelo para obtener los datos
        $datos = Carrera::obtenerTodosLosDatos();

        // Pasar los datos a la vista
        return view('admin/carrerasAdmin', ['datos' => $datos]);
    }
    public function añadirCarreras()
    {
        return view('admin/carrerasAdd');
    }
    public function editarCarrera($id)
    {
        $carrera = Carrera::findOrFail($id);
        // Pasar los datos de la carrera a la vista del formulario de edición
        return view('admin/editarCarreras', compact('carrera'));
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

    public function verCarreras(){
        // Obtener la próxima carrera
        $proximaCarrera = Carrera::where('fecha_inicio', '>', Carbon::now())
            ->orderBy('fecha_inicio', 'asc')
            ->first();
        // Obtener todas las carreras que comienzan en o después de la fecha actual
        $datos = Carrera::where('fecha_inicio', '>=', Carbon::today())
            ->orderBy('fecha_inicio', 'asc')
            ->get();
        $sponsors = Sponsor::sponsorsPrincipales();
        // Pasar los datos a la vista
        return view('principal/carreras', [
            'proximaCarrera' => $proximaCarrera,
            'datos' => $datos,
            'sponsors' => $sponsors
        ]);
    }
}
