<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corredor extends Model
{
    use HasFactory;
    // Define los atributos de la clase Carrera
    protected $fillable = [
        'id', 'dni', 'nombre', 'apellidos', 'contraseña',
        'direccion', 'nacimiento', 'nivel', 'socio',
        'numero_federado', 'id_seguro'
    ];

    public static function obtenerTodosLosDatos()
    {
        // Obtener todos los datos de la tabla utilizando Eloquent
        $datos = Corredor::all();

        // Devolver los datos obtenidos
        return $datos;
    }
}
