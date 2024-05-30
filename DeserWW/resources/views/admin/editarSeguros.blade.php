<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seguro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/editarSeguro.css') }}" rel="stylesheet">
</head>

<body>

    <form action="{{ route('editar-seguros') }}" method="POST">
        <h2>Editar Seguro</h2>
        @csrf
        <input type="hidden" name="id" value="{{ $seguro->id }}">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required value="{{ $seguro->nombre }}">
        </div>
        <div>
            <label for="CIF">CIF:</label>
            <input type="text" id="CIF" name="CIF" required value="{{ $seguro->CIF }}">
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required value="{{ $seguro->direccion }}">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required value="{{ $seguro->precio }}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <a href="#" onclick="window.history.back();">
        <h5>Volver</h5>
    </a>
    </form>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
