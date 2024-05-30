<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/editarForm.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="{{ route('editar-carreras') }}" method="POST" class="mt-4">
            <h2 class="mt-3">Editar Carrera</h2>
            @csrf
            <input type="hidden" name="id" value="{{ $carrera->id }}">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required value="{{ $carrera->nombre }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $carrera->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="desnivel">Desnivel:</label>
                <input type="text" id="desnivel" name="desnivel" class="form-control" required value="{{ $carrera->desnivel }}">
            </div>
            <div class="form-group">
                <label for="mapa">Mapa:</label>
                <input type="text" id="mapa" name="mapa" class="form-control" required value="{{ $carrera->mapa }}">
            </div>
            <div class="form-group">
                <label for="max_participantes">Máximo de participantes:</label>
                <input type="number" id="max_participantes" name="max_participantes" class="form-control" required value="{{ $carrera->max_participantes }}">
            </div>
            <div class="form-group">
                <label for="km">Kilómetros:</label>
                <input type="number" id="km" name="km" class="form-control" required value="{{ $carrera->km }}">
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required value="{{ $carrera->fecha_inicio }}">
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" required value="{{ $carrera->hora_inicio }}">
            </div>
            <div class="form-group">
                <label for="salida">Salida:</label>
                <input type="text" id="salida" name="salida" class="form-control" required value="{{ $carrera->salida }}">
            </div>
            <div class="form-group">
                <label for="cartel">Cartel:</label>
                <input type="text" id="cartel" name="cartel" class="form-control" required value="{{ $carrera->cartel }}">
            </div>
            <div class="form-group">
                <label for="precio_patrocinar">Precio para patrocinar:</label>
                <input type="number" id="precio_patrocinar" name="precio_patrocinar" class="form-control" required value="{{ $carrera->precio_patrocinar }}">
            </div>
            <div class="form-group">
                <label for="precio_inscripcion">Precio de inscripción:</label>
                <input type="number" id="precio_inscripcion" name="precio_inscripcion" class="form-control" required value="{{ $carrera->precio_inscripcion }}">
            </div>
            <div class="form-group">
                <input type="hidden" id="id_sponsor" name="id_sponsor" value="{{ $carrera->id_sponsor }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
