<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarreraAdmin</title>
</head>
<body>
    <h2>Carreras</h2>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Corredor</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Desnivel</th>
            <th>Mapa</th>
            <th>Participantes Máximos</th>
            <th>Kilómetros</th>
            <th>Fecha de Inicio</th>
            <th>Hora de Inicio</th>
            <th>Salida</th>
            <th>Cartel</th>
            <th>Precio para Patrocinar</th>
            <th>Precio de Inscripción</th>
            <th>ID del Sponsor</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato)
        <tr>
            <td>{{ $dato->id }}</td>
            <td>{{ $dato->id_corredor }}</td>
            <td>{{ $dato->nombre }}</td>
            <td>{{ $dato->descripcion }}</td>
            <td>{{ $dato->desnivel }}</td>
            <td>{{ $dato->mapa }}</td>
            <td>{{ $dato->max_participantes }}</td>
            <td>{{ $dato->km }}</td>
            <td>{{ $dato->fecha_inicio }}</td>
            <td>{{ $dato->hora_inicio }}</td>
            <td>{{ $dato->salida }}</td>
            <td>{{ $dato->cartel }}</td>
            <td>{{ $dato->precio_patrocinar }}</td>
            <td>{{ $dato->precio_inscripcion }}</td>
            <td>{{ $dato->id_sponsor }}</td>
            <td><a href="{{ route('editar-carrera', ['id' => $dato->id]) }}">Editar</a></td>
           

        </tr>
        @endforeach
    </tbody>
</table>

    

</body>
</html>