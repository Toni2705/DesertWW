<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
     // Define los atributos de la clase Carrera
     protected $fillable = [
        'id', 'nombre', 'descripcion', 'desnivel',
        'mapa', 'max_participantes', 'km', 'fecha_inicio',
        'hora_inicio', 'salida', 'cartel', 'precio_patrocinar',
        'precio_inscripcion', 'id_sponsor'
    ];

        //FUNCIONES QUE EJECUTARA ESTA CLASE

        public static function obtenerTodosLosDatos()
        {
            // Obtener todos los datos de la tabla utilizando Eloquent
            $datos = Carrera::orderBy('fecha_inicio', 'asc')->get();
            // Devolver los datos obtenidos
            return $datos;
        }

    public static function editarDatos($datos)
    {
        // Obtenemos el ID de la carrera a editar
        $idCarrera = $datos['id'];

        // Buscamos la carrera en la base de datos
        $carrera = Carrera::find($idCarrera);

        // Verificamos si la carrera existe
        if ($carrera) {
            // Actualizamos los datos de la carrera con los nuevos valores del formulario
            $carrera->update([
                'nombre' => $datos['nombre'],
                'descripcion' => $datos['descripcion'],
                'desnivel' => $datos['desnivel'],
                'mapa' => $datos['mapa'],
                'max_participantes' => $datos['max_participantes'],
                'km' => $datos['km'],
                'fecha_inicio' => $datos['fecha_inicio'],
                'hora_inicio' => $datos['hora_inicio'],
                'salida' => $datos['salida'],
                'cartel' => $datos['cartel'],
                'precio_patrocinar' => $datos['precio_patrocinar'],
                'precio_inscripcion' => $datos['precio_inscripcion'],
                'id_sponsor' => $datos['id_sponsor']
            ]);

            // Retornamos verdadero para indicar que la edición fue exitosa
            return true;
        }

        // Retornamos falso si no se encontró la carrera a editar
        return false;
    }
    public static function agregarCarrera($datos)
{
        // Crear una nueva instancia de Carrera con los datos proporcionados
        $nuevaCarrera = new Carrera();
        $nuevaCarrera->nombre = $datos['nombre'];
        $nuevaCarrera->descripcion = $datos['descripcion'];
        $nuevaCarrera->desnivel = $datos['desnivel'];
        $nuevaCarrera->mapa = $datos['mapa'];
        $nuevaCarrera->max_participantes = $datos['max_participantes'];
        $nuevaCarrera->km = $datos['km'];
        $nuevaCarrera->fecha_inicio = $datos['fecha_inicio'];
        $nuevaCarrera->hora_inicio = $datos['hora_inicio'];
        $nuevaCarrera->salida = $datos['salida'];
        $nuevaCarrera->cartel = $datos['cartel'];
        $nuevaCarrera->precio_patrocinar = $datos['precio_patrocinar'];
        $nuevaCarrera->precio_inscripcion = $datos['precio_inscripcion'];
        $nuevaCarrera->id_sponsor = $datos['id_sponsor'];

        // Guardar la nueva carrera en la base de datos
        $nuevaCarrera->save();

        // Retornar la carrera recién creada
        return $nuevaCarrera;
    }


}
