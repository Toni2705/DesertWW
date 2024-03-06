<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
</head>
<body>
<h2>Agregar Carrera</h2>
    <form action="{{ route('agregar-carrera') }}" method="POST">
        @csrf
        <div>
            <label for="id_corredor">ID Corredor:</label>
            <input type="text" id="id_corredor" name="id_corredor" required>
        </div>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>
        <div>
            <label for="desnivel">Desnivel:</label>
            <input type="text" id="desnivel" name="desnivel" required>
        </div>
        <div>
            <label for="mapa">Mapa:</label>
            <input type="text" id="mapa" name="mapa" required>
        </div>
        <div>
            <label for="max_participantes">Máximo de participantes:</label>
            <input type="number" id="max_participantes" name="max_participantes" required>
        </div>
        <div>
            <label for="km">Kilómetros:</label>
            <input type="number" id="km" name="km" required>
        </div>
        <div>
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required>
        </div>
        <div>
            <label for="hora_inicio">Hora de inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required>
        </div>
        <div>
            <label for="salida">Salida:</label>
            <input type="text" id="salida" name="salida" required>
        </div>
        <div>
            <label for="cartel">Cartel:</label>
            <input type="text" id="cartel" name="cartel" required>
        </div>
        <div>
            <label for="precio_patrocinar">Precio para patrocinar:</label>
            <input type="number" id="precio_patrocinar" name="precio_patrocinar" required>
        </div>
        <div>
            <label for="precio_inscripcion">Precio de inscripción:</label>
            <input type="number" id="precio_inscripcion" name="precio_inscripcion" required>
        </div>
        <div>
            <label for="id_sponsor">ID del sponsor:</label>
            <input type="text" id="id_sponsor" name="id_sponsor" required>
        </div>
        <div>
            <button type="submit">Agregar Carrera</button>
        </div>
    </form>
</body>
</html>