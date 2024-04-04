<?php

namespace App\Http\Controllers;

use App\Models\Dorsal;
use Illuminate\Http\Request;

class DorsalController extends Controller
{
    public function inscribirse(Request $request)
    {
        // Verificar si el usuario está autenticado
        if ($request->input('corredor_id') != null) {
            
            // Obtener el usuario autenticado
            $carreraId = $request->input('carrera_id');
            $corredorId = $request->input('corredor_id');
            $seguroId = $request->input('seguro');

            $ultimoDorsal = Dorsal::where('id_carrera', $carreraId)->orderBy('dorsal', 'desc')->first();
            $numeroDorsal = $ultimoDorsal ? intval(substr($ultimoDorsal->dorsal, 1)) + 1 : 1;
            
            // Crear un nuevo objeto Dorsal con los datos recibidos
            $dorsal = new Dorsal();
            $dorsal->id_carrera = $carreraId;
            $dorsal->id_corredor = $corredorId;
            $dorsal->id_seguro = $seguroId;
            $dorsal->dorsal = "D". $numeroDorsal;
            $dorsal->qr = "qrfoto.jpg";


            // Guardar el nuevo dorsal en la base de datos
            $dorsal->save();
        
            
            return redirect()->back()->with('success', 'Te has inscrito correctamente.');
        } else {
            //TEMPORAL ESE ALERT
            ?>
            <script>
                alert("Debes iniciar sesion para poder inscribirte");
            </script>
            <?php
            // Usuario no autenticado, redirigirlo al formulario de inicio de sesión
            return view('admin/loginAdmin');
        }
    }
}
