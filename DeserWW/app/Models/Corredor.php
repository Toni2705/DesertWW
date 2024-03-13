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
        'numero_federado', 'id_seguro', 'rol'
    ];

    public static function obtenerTodosLosDatos()
    {
        // Obtener todos los datos de la tabla utilizando Eloquent
        $datos = Corredor::all();

        // Devolver los datos obtenidos
        return $datos;
    }
    public static function buscarUsuario($dni, $contraseña)
    {
        // Buscar un corredor con el DNI y la contraseña proporcionados
        $corredor = Corredor::where('dni', $dni)
            ->where('contrasena', $contraseña)
            ->first();

        // Devolver el corredor encontrado (o null si no se encuentra)
        return $corredor;
    }

    public static function registrarCorredor($datos)
    {
        // Crear una nueva instancia de Corredor con los datos proporcionados
        $nuevoCorredor = new Corredor();
        $nuevoCorredor->dni = $datos['dni'];
        $nuevoCorredor->nombre = $datos['nombre'];
        $nuevoCorredor->apellidos = $datos['apellidos'];
        $nuevoCorredor->contraseña = $datos['contraseña'];
        $nuevoCorredor->direccion = $datos['direccion'];
        $nuevoCorredor->nacimiento = $datos['nacimiento'];
        $nuevoCorredor->nivel = $datos['nivel'];
        $nuevoCorredor->socio = $datos['socio'];
        $nuevoCorredor->numero_federado = $datos['numero_federado'];
        $nuevoCorredor->rol = 'usuario';

        // Guardar el nuevo usuario en la base de datos
        $nuevoCorredor->save();

        // Retornar la carrera recién creada
        return $nuevoCorredor;
    }
}
