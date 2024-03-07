<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h2>Editar Seguro</h2>

    <form action="{{ route('editar-seguros') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $seguro->id }}">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required value="{{ $seguro->nombre }}">
        </div>
        <div>
            <label for="CIF">CIF:</label>
            <input type="text" id="CIF" required name="CIF" value="{{ $seguro->CIF }}">
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" required name="direccion" value="{{ $seguro->direccion }}">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" required name="precio" value="{{ $seguro->precio }}">
        </div>
        <div>
            <button type="submit">Guardar cambios</button>
        </div>
    </form>


</body>

</html>