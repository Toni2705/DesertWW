<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sponsor</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/editarSponsor.css') }}" rel="stylesheet">
   
</head>
<body>


    <form action="{{ route('actualizar-sponsor') }}" method="POST">
    <h2>Editar Sponsor</h2>
        @csrf
        <input type="hidden" name="id" value="{{ $sponsor->id }}">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required value="{{ $sponsor->nombre }}">
        </div>
        <div>
            <label for="CIF">CIF:</label>
            <input type="text" id="CIF" name="CIF" required value="{{ $sponsor->CIF }}">
        </div>
        <div>
            <label for="logo">Logo:</label>
            <input type="text" id="logo" name="logo" required value="{{ $sponsor->logo }}">
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required value="{{ $sponsor->direccion }}">
        </div>
        <div>
            <label for="principal">Principal:</label>
            <input type="text" id="principal" name="principal" required value="{{ $sponsor->principal }}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>


</body>
</html>
