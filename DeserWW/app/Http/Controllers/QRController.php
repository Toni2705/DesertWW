<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use App\Models\Dorsal;
use App\Models\Carrera;
use DateTime;


class QRController extends Controller
{
    public function readQr($qr)
    {
        // Buscar el dorsal asociado con el QR
        $dorsal = Dorsal::where('qr', $qr)->firstOrFail();


        // Verificar si el tiempo ya está definido en el registro del dorsal
        if ($dorsal->tiempo !== null) {
            echo 'El tiempo ya estaba definido.';
        }else{
            // Obtener la carrera asociada al dorsal
            $carrera = Carrera::findOrFail($dorsal->id_carrera);


            // Calcular el tiempo desde el inicio de la carrera hasta ahora
            $tiempoInicio = new DateTime($carrera->hora_inicio);
            $tiempoActual = new DateTime();
            $tiempo = $tiempoActual->diff($tiempoInicio);


            // Formatear el tiempo en el formato deseado, por ejemplo, H:i:s
            $tiempoFormateado = $tiempo->format('%H:%I:%S');


            // Actualizar el tiempo en el registro del dorsal
            $dorsal->tiempo = $tiempoFormateado;
            $dorsal->save();
        }
    }
}