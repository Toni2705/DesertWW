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
                <td>{{ $dato->nombre }}</td>
                <td>{{ $dato->CIF }}</td>
                <td>{{ $dato->direccion }}</td>
                <td>{{ $dato->precio }}</td>
                <td><a href="{{ route('editar-seguro', ['id' => $dato->id]) }}">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>