<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Sponsor</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/sponsorAdd.css') }}" rel="stylesheet">
</head>
<body>


    <form action="{{ route('guardar-sponsor') }}" method="POST">
    <h2>Añadir Sponsor</h2>
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="CIF">CIF:</label>
            <input type="text" id="CIF" name="CIF" required>
        </div>
        <div>
            <label for="logo">Logo:</label>
            <input type="text" id="logo" name="logo" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <div>
            <label for="principal">Principal:</label>
            <input type="text" id="principal" name="principal" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Agregar Sponsor</button>
        </div>
    </form>

</body>
</html>
