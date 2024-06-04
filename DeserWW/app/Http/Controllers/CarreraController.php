<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrera;
use App\Models\Corredor;
use App\Models\Seguro;
use App\Models\Sponsor;
use App\Models\Dorsal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\DorsalController;
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
        $carrerasFuturas = Carrera::where('fecha_inicio', '>=', Carbon::today())
            ->orderBy('fecha_inicio', 'asc')
            ->get();
        $sponsorsPrincipales = Sponsor::sponsorsPrincipales();
        // Pasar los datos a la vista
        return view('principal/menuprincipal', [
            'proximaCarrera' => $proximaCarrera,
            'carrerasFuturas' => $carrerasFuturas,
            'sponsorsPrincipales' => $sponsorsPrincipales
        ]);
    }
    // public function mostrarMenuPrincipal()
    // {
    //     // Obtener la próxima carrera
    //     $proximaCarrera = Carrera::where('fecha_inicio', '>', Carbon::now())
    //         ->orderBy('fecha_inicio', 'asc')
    //         ->first();
    //     // Obtener todas las carreras que comienzan en o después de la fecha actual
    //     $datos = Carrera::where('fecha_inicio', '>=', Carbon::today())
    //         ->orderBy('fecha_inicio', 'asc')
    //         ->get();
    //     $sponsors = Sponsor::sponsorsPrincipales();
    //     // Pasar los datos a la vista
    //     return view('principal/menuprincipal', [
    //         'proximaCarrera' => $proximaCarrera,
    //         'datos' => $datos,
    //         'sponsors' => $sponsors
    //     ]);
    // }
    public function carreraInfo($id)
    {
        // Buscar la carrera por su ID
        $carrera = Carrera::find($id);
        $dorsalController = new DorsalController();
        $inscrito = $dorsalController->verificarInscripcion($id, Auth::id());

        // Verificar si se encontró la carrera
        if ($carrera) {
            $seguros = Seguro::obtenerTodosLosDatos();
            // Obtener los dorsales completados para esta carrera
            $dorsalesCompletados = Dorsal::where('id_carrera', $id)
            ->whereNotNull('tiempo')
            ->with('corredor') // Assuming Dorsal model has a relationship with Corredor
            ->get();
            // Retornar la vista con los datos de la carrera y los dorsales completados
            return view('principal/carreraInfo', compact('carrera', 'seguros', 'dorsalesCompletados','inscrito'));
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
        // Obtener todas las carreras que comienzan en o después de la fecha actual
        $datos = Carrera::orderBy('fecha_inicio', 'asc')->get();
        $sponsors = Sponsor::sponsorsPrincipales();
        // Pasar los datos a la vista
        return view('principal/carreras', [
            'datos' => $datos,
            'sponsors' => $sponsors
        ]);

    }

    public function añadirFotos($id){
        $carrera = Carrera::find($id);
        return view('admin/subirFotos', compact('carrera'));
    }

    public function clasificacion(Request $request, $carreraId){
        // Obtener los dorsales completados para la carrera específica
        $dorsalesCompletados = DB::table('dorsals')
            ->select('corredors.nombre', 'corredors.apellidos', 'dorsals.tiempo')
            ->join('corredors', 'corredors.id', '=', 'dorsals.id_corredor')
            ->where('dorsals.id_carrera', $carreraId)
            ->whereNotNull('dorsals.tiempo')
            ->orderBy('dorsals.tiempo')
            ->get();


        // Devolver la vista con los dorsales completados y sus tiempos
        return view('clasificacion', compact('dorsalesCompletados'));
    }

    public function comprobacion(Request $request ,$precio){
        $corredor = Corredor::where('id', $request->corredor_id)->first();
        $carrera = Carrera::where('id', $request->carrera_id)->first();
        $seguro = Seguro::where('id', $request->seguro)->first();
        $dorsal = Dorsal::where('id_corredor', $request->corredor_id)->where('id_carrera', $request->carrera_id)->first();
        
        return view('principal/comprobacion', compact('precio','corredor', 'carrera', 'seguro','dorsal'));
    }

}
