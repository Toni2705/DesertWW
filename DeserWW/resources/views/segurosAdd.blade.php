<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Seguro</title>
</head>

<body>

    <form action="{{ route('guardar-seguro') }}" method="POST">
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
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Agregar Seguro</button>
        </div>
    </form>
</body>

</html>