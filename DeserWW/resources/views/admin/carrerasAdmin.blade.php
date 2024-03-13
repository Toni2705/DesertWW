<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarreraAdmin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Carreras</h2>

    <h4><a href="{{ route('agregar-carrera') }}" class="btn btn-primary">Añadir</a></h4>

<div class="container">
<table class="table table-bordered  table-responsive-md" >
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Desnivel</th>
            <th>Mapa</th>
            <th>Participantes</th>
            <th>Kilómetros</th>
            <th>Fecha</th>
            <th>HInicio</th>
            <th>Salida</th>
            <th>Cartel</th>
            <th>Precio</th>
            <th>Inscripción</th>
            <th>Sponsor</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato)
        <tr>
            <td>{{ $dato->nombre }}</td>
            <td>{{ $dato->descripcion }}</td>
            <td>{{ $dato->desnivel }}</td>
            <td>{{ $dato->mapa }}</td>
            <td>{{ $dato->max_participantes }}</td>
            <td>{{ $dato->km }}km</td>
            <td>{{ $dato->fecha_inicio }}</td>
            <td>{{ $dato->hora_inicio }}</td>
            <td>{{ $dato->salida }}</td>
            <td>{{ $dato->cartel }}</td>
            <td>{{ $dato->precio_patrocinar }}€</td>
            <td>{{ $dato->precio_inscripcion }}€</td>
            <td>{{ $dato->id_sponsor }}</td>
            <td><a href="{{ route('editar-carrera', ['id' => $dato->id]) }}"class="btn btn-primary">Editar</a></td>
           

        </tr>
        @endforeach
    </tbody>
</table>
</div>

    

</body>
</html>