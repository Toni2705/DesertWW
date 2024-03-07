<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'nombre', 'CIF', 'logo',
        'direccion', 'principal'
    ];

    public static function obtenerTodosLosDatos()
        {
            // Obtener todos los datos de la tabla utilizando Eloquent
            $datos = Sponsor::all();

            // Devolver los datos obtenidos
            return $datos;
        }

        public static function editarDatos($datos)
        {
            $idSponsor = $datos['id'];
    
            $sponsor = self::find($idSponsor);
    
            if ($sponsor) {
                $sponsor->update([
                    'nombre' => $datos['nombre'],
                    'CIF' => $datos['CIF'],
                    'logo' => $datos['logo'],
                    'direccion' => $datos['direccion'],
                    'principal' => $datos['principal']
                ]);
    
                return true;
            }
    
            return false;
        }
    
        public static function agregarSponsor($datos)
        {
            $nuevoSponsor = new self();
            $nuevoSponsor->nombre = $datos['nombre'];
            $nuevoSponsor->CIF = $datos['CIF'];
            $nuevoSponsor->logo = $datos['logo'];
            $nuevoSponsor->direccion = $datos['direccion'];
            $nuevoSponsor->principal = $datos['principal'];
    
            $nuevoSponsor->save();
    
            return $nuevoSponsor;
        }
}
