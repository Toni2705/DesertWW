<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SegurosAdmin</title>
</head>

<body>
    <h2>Seguros</h2>

    <h4><a href="{{ route('agregar-seguro') }}">Añadir</a></h4>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CIF</th>
                <th>Dirección</th>
                <th>Precio</th>
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
                <td><a href="{{ route('editar-seguro', ['id' => $dato->id]) }}">Editar</a></td>


            </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>