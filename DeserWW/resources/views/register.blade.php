<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .container-fluid {
            background: url('/images/backgroundLogin.png') no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .register-box {
            background-color: transparent;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 40vw;
            width: 100%;
        }

        .form-control {
            background: transparent !important;
            border-color: black;
            color: black;
        }

        /* Estilos adicionales personalizados */
        .form-group {
            position: relative;
        }

        .input-group-append {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            padding-right: 10px;
            /* Espacio entre el input y el ícono */
        }

        .form-control:disabled {
            background: transparent;
        }

        /* Cambiar cursor a 'not-allowed' al pasar el mouse sobre el campo deshabilitado */
        #numero_federado:disabled:hover {
            cursor: not-allowed;
        }

        /* Anular el cambio de fondo al hacer clic en los inputs */
        .form-control:focus {
            background: transparent !important;
            border-color: black;
            color: black;
            box-shadow: none !important;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center register-box">
            <div class="col-md-12 text-center mb-4">
                <h2>Regístrate</h2>
                <p>¿Ya tienes cuenta? <a href="/">Inicia sesión</a></p>
            </div>
            <div class="col-md-6">
                <form action="{{ route('guardar-corredor') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" id="dni" name="dni" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" required class="form-control">
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="nacimiento">Fecha de nacimiento:</label>
                    <input type="date" id="nacimiento" name="nacimiento" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="nivel">Nivel:</label>
                    <select name="nivel" id="nivel" class="form-control">
                        <option value="OPEN" selected>OPEN</option>
                        <option value="PRO">PRO</option>
                    </select>
                </div>
                <div class="form-group" id="numero_federado_div">
                    <label for="numero_federado">Número de federado (PRO):</label>
                    <input type="text" id="numero_federado" name="numero_federado" class="form-control" disabled>
                </div>
            </div>

            <!-- Botón de envío -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
            <!-- Fin Botón de envío -->
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#nivel').change(function() {
                if ($(this).val() === 'PRO') {
                    $('#numero_federado').prop('disabled', false);
                } else {
                    $('#numero_federado').prop('disabled', true);
                }
            });
        });
    </script>
</body>

</html>