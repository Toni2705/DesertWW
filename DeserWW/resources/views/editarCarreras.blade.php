<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<h2>Editar Carrera</h2>

<form action="{{ route('editar-carreras') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $carrera->id }}">
    <div>
        <label for="id_corredor">ID Corredor:</label>
        <input type="text" id="id_corredor" name="id_corredor" required value="{{ $carrera->id_corredor }}">
    </div>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required value="{{ $carrera->nombre }}">
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" required name="descripcion">{{ $carrera->descripcion }}</textarea>
    </div>
    <div>
        <label for="desnivel">Desnivel:</label>
        <input type="text" id="desnivel" required name="desnivel" value="{{ $carrera->desnivel }}">
    </div>
    <div>
        <label for="mapa">Mapa:</label>
        <input type="text" id="mapa" required name="mapa" value="{{ $carrera->mapa }}">
    </div>
    <div>
        <label for="max_participantes">Máximo de participantes:</label>
        <input type="number" id="max_participantes" required name="max_participantes" value="{{ $carrera->max_participantes }}">
    </div>
    <div>
        <label for="km">Kilómetros:</label>
        <input type="number" id="km" name="km" required value="{{ $carrera->km }}">
    </div>
    <div>
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" id="fecha_inicio" required name="fecha_inicio" value="{{ $carrera->fecha_inicio }}">
    </div>
    <div>
        <label for="hora_inicio">Hora de inicio:</label>
        <input type="time" id="hora_inicio" required name="hora_inicio" value="{{ $carrera->hora_inicio }}">
    </div>
    <div>
        <label for="salida">Salida:</label>
        <input type="text" id="salida" required name="salida" value="{{ $carrera->salida }}">
    </div>
    <div>
        <label for="cartel">Cartel:</label>
        <input type="text" id="cartel" required name="cartel" value="{{ $carrera->cartel }}">
    </div>
    <div>
        <label for="precio_patrocinar">Precio para patrocinar:</label>
        <input type="number" id="precio_patrocinar" required name="precio_patrocinar" value="{{ $carrera->precio_patrocinar }}">
    </div>
    <div>
        <label for="precio_inscripcion">Precio de inscripción:</label>
        <input type="number" id="precio_inscripcion" required name="precio_inscripcion" value="{{ $carrera->precio_inscripcion }}">
    </div>
    <div>
        <input type="hidden" id="id_sponsor" name="id_sponsor" value="{{ $carrera->id_sponsor }}">
    </div>
    <div>
        <button type="submit">Guardar cambios</button>
    </div>
</form>


</body>
</html>