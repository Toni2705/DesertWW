<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SegurosAdmin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Seguros</h2>

        <h4><a href="{{ route('agregar-seguro') }}" class="btn btn-primary">Añadir</a></h4>

        <table class="table table-bordered">
            <thead class="thead-light">
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
                    <td><a href="{{ route('editar-seguro', ['id' => $dato->id]) }}" class="btn btn-primary">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
