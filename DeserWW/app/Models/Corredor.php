<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Corredor extends Model
{
    use HasFactory;
    // Define los atributos de la clase Carrera
    protected $fillable = [
        'id', 'dni', 'nombre', 'apellidos', 'contrasena',
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
    // Buscar un corredor con el DNI proporcionado
    $corredor = Corredor::where('dni', $dni)->first();

    // Verificar si se encontró un corredor
    if ($corredor) {
        // Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
        if ($contraseña === $corredor->contrasena) {            
            return $corredor;
        }
    }
}
    public static function registrarCorredor($datos)
    {
        // Crear una nueva instancia de Corredor con los datos proporcionados
        $nuevoCorredor = new Corredor();
        $nuevoCorredor->dni = $datos['dni'];
        $nuevoCorredor->nombre = $datos['nombre'];
        $nuevoCorredor->apellidos = $datos['apellidos'];
        $nuevoCorredor->contrasena = $datos['contrasena'];
        $nuevoCorredor->direccion = $datos['direccion'];
        $nuevoCorredor->nacimiento = $datos['nacimiento'];
        $nuevoCorredor->nivel = $datos['nivel'];
        $nuevoCorredor->socio = true;
        $nuevoCorredor->numero_federado = $datos['numero_federado'];
        $nuevoCorredor->rol = 'usuario';

        // Guardar el nuevo usuario en la base de datos
        $nuevoCorredor->save();
        // Retornar la carrera recién creada
        return $nuevoCorredor;
    }
}
