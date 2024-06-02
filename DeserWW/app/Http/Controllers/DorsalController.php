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
        if ($request->input('corredor_id') != null) {
            $dorsalId = $request->input('id');
            $carreraId = $request->input('carrera_id');
            $corredorId = $request->input('corredor_id');
            $seguroId = $request->input('seguro');

            // Generar el código QR con el ID del dorsal
            $qrCode = new QrCode('read-qr/'.$dorsalId);


            // Guardar la imagen del código QR en el almacenamiento
            $qrPath = public_path('qr_codes/' . $corredorId . '.jpg');
            $qrCode->writeFile(storage_path('app/public/' . $qrPath));

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
        
            
            return redirect()->back()->with('success', 'Te has inscrito correctamente.');
        } else {
            // Primero tenemos que insertar el usuario y luego hacer el insert en la tabla dorsales.
            $invitado = Corredor::insertarCorredor($request->input('dni'), $request->input('nombre'), $request->input('apellidos'),$request->input('direccion'), $request->input('nacimiento'), $request->input('nivel'), $request->input('numero_federado'), $request->input('seguro'));
            // var_dump($request->input('dni'));
        }
    }
}
