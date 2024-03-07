<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    use HasFactory;
    // Define los atributos de la clase Seguro
    protected $fillable = [
        'id', 'nombre', 'CIF', 'direccion',
        'precio'
    ];

    //FUNCIONES QUE EJECUTARA ESTA CLASE

    public static function obtenerTodosLosDatos()
    {
        // Obtener todos los datos de la tabla utilizando Eloquent
        $datos = Seguro::all();

        // Devolver los datos obtenidos
        return $datos;
    }

    public static function editarDatos($datos)
    {
        // Obtenemos el ID del seguro a editar
        $idSeguro = $datos['id'];

        // Buscamos el seguro en la base de datos
        $seguro = Seguro::find($idSeguro);

        // Verificamos si el seguro existe
        if ($seguro) {
            // Actualizamos los datos del seguro con los nuevos valores del formulario
            $seguro->update([
                'nombre' => $datos['nombre'],
                'CIF' => $datos['CIF'],
                'direccion' => $datos['direccion'],
                'precio' => $datos['precio']
            ]);

            // Retornamos verdadero para indicar que la edición fue exitosa
            return true;
        }

        // Retornamos falso si no se encontró el seguro a editar
        return false;
    }
    public static function agregarSeguro($datos)
    {
        // Crear una nueva instancia de Seguro con los datos proporcionados
        $nuevoSeguro = new Seguro();
        $nuevoSeguro->nombre = $datos['nombre'];
        $nuevoSeguro->direccion = $datos['direccion'];
        $nuevoSeguro->CIF = $datos['CIF'];
        $nuevoSeguro->precio = $datos['precio'];

        // Guardar el nuevo seguro en la base de datos
        $nuevoSeguro->save();

        // Retornar el seguro recién creada
        return $nuevoSeguro;
    }
}
