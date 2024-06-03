<?php

namespace App\Http\Controllers;

use App\Models\Dorsal;
use App\Models\Corredor;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Carbon\Carbon;

class DorsalController extends Controller
{
    public function inscribirse(Request $request)
{
    // Verificar si el usuario está autenticado
    if ($request->input('corredorId') != null) {
        $carreraId = $request->input('carreraId');
        $corredorId = $request->input('corredorId');
        $seguroId = $request->input('seguroId');
        $precioTotal = $request->input('precioTotal');

        // Generar el código QR con el ID del corredor
        $qrCode = new QrCode('read-qr/'.$corredorId);

        // Guardar la imagen del código QR en el almacenamiento
        $qrPath = 'qr_codes/' . $corredorId . '.png'; // Cambia la extensión del archivo si prefieres otro formato de imagen
        $qrCode = storage_path('app/public/' . $qrPath); //


        // Obtener el último dorsal registrado para la carrera
        $ultimoDorsal = Dorsal::where('id_carrera', $carreraId)->orderBy('dorsal', 'desc')->first();
        $numeroDorsal = $ultimoDorsal ? intval(substr($ultimoDorsal->dorsal, 1)) + 1 : 1;
        
        // Crear un nuevo objeto Dorsal con los datos recibidos
        $dorsal = new Dorsal();
        $dorsal->id_carrera = $carreraId;
        $dorsal->id_corredor = $corredorId;
        $dorsal->id_seguro = $seguroId;
        $dorsal->dorsal = "D". $numeroDorsal;
        $dorsal->qr = $qrPath;

        // Guardar el nuevo dorsal en la base de datos
        $dorsal->save();

        // Aquí puedes realizar otras acciones necesarias, como enviar correos electrónicos de confirmación, etc.

        // Devolver una respuesta adecuada
        return response()->json(['message' => 'Inscripción realizada con éxito'], 200);
    } else {
        // Si el corredor no está autenticado, puedes manejar esto de acuerdo a tus necesidades.
        // Por ejemplo, puedes mostrar un mensaje de error o realizar otras acciones.
        return response()->json(['error' => 'El corredor no está autenticado'], 401);
    }
}

}
