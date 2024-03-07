<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CorredoresAdmin</title>
    <!-- Provided Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">DNI</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Dirección</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                <tr>
                    <td class="text-center">{{ $dato->dni }}</td>
                    <td class="text-center">{{ $dato->nombre }}</td>
                    <td class="text-center">{{ $dato->apellidos }}</td>
                    <td class="text-center">{{ $dato->direccion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>