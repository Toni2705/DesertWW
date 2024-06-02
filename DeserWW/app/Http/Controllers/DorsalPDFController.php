<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;
use App\Models\Carrera;
use App\Models\Dorsal;


class DorsalPDFController extends Controller
{
    public function generatePDF($id)
    {
        // Obtener la carrera por su ID
        $carrera = Carrera::findOrFail($id);


        // Obtener los dorsales asociados a la carrera, cargando la relación con el corredor
        $dorsales = Dorsal::where('id_carrera', $id)->with('corredor')->get();


        // Generar la vista del PDF con los datos obtenidos
        $pdf = PDF::loadView('pdf.dorsales', compact('carrera', 'dorsales'));


        // Descargar el PDF
        return $pdf->download('dorsales'.$carrera->nombre.'.pdf');
    }
}


