<?php

namespace App\Http\Controllers;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function store(Request $request, $carrera_id)
{
    if ($request->hasFile('imagenes')) {
        foreach ($request->file('imagenes') as $imagen) {
            // Obtener el nombre original del archivo
            $nombreArchivo = $imagen->getClientOriginalName();
            
            // Crear la ruta relativa manualmente
            $rutaRelativa = 'fotosCarrera/' . $nombreArchivo;

            // Crear una nueva entrada de foto en la base de datos con la ruta relativa
            Foto::create([
                'carrera_id' => $carrera_id,
                'foto' => $rutaRelativa
            ]);
        }
    }

    // Redireccionar o devolver una respuesta según sea necesario
    return redirect()->back()->with('success', 'Imágenes subidas correctamente.');
}

    public function mostrarFotos($id)
    {
        // Obtener todas las fotos de la carrera con el ID proporcionado
        $fotos = Foto::where('carrera_id', $id)->get();
        
        // Pasar las fotos a la vista y retornarla
        return view('principal/carrusel', compact('fotos'));
    }



}
