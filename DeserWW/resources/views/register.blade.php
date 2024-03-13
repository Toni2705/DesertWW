<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"],
        form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <form action="{{ route('register') }}" method="POST">
        <h2>Registro de Corredores</h2>

        @csrf
        <div>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>
        </div>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>
        <div>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <div>
            <label for="nacimiento">Fecha nacimiento:</label>
            <input type="date" id="nacimiento" name="nacimiento" required>
        </div>
        <div>
            <label for="nivel">Nivel:</label>
            <select name="nivel" id="nivel">
                <option value="OPEN" selected>OPEN</option>
                <option value="PRO">PRO</option>
            </select>
        </div>
        <div id="numero_federado_div" style="display: none;">
            <label for="numero_federado">Número de federado:</label>
            <input type="text" id="numero_federado" name="numero_federado">
        </div>
        <div>
            <label for="socio">Socio:</label>
            <input type="checkbox" id="socio" name="socio" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Agregar Carrera</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#nivel').change(function() {
                if ($(this).val() === 'PRO') {
                    $('#numero_federado_div').show();
                    $('#numero_federado').prop('required', true);
                } else {
                    $('#numero_federado_div').hide();
                    $('#numero_federado').prop('required', false);
                }
            });
        });
    </script>
</body>

</html>