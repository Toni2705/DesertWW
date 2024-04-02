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

        /* Estilos para los mensajes de error */
        .error-message {
            color: red;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: none;
        }

        .is-invalid {
            border-color: red !important;
        }

        .dni-error {
            text-align: end;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center register-box">
            <div class="col-md-12 text-center mb-4">
                <h2>Regístrate</h2>
                <p>¿Ya tienes cuenta? <a href="/login">Inicia sesión</a></p>
            </div>
            <div class="col-md-6">
                <form action="{{ route('guardar-corredor') }}" method="POST">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" id="dni" name="dni" required class="form-control">
                        <div class="error-message"></div>
                    </div> -->

                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <div class="error-message ml-2 d-inline-block"></div>
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
                        <div class="error-message"></div>
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

            // Función para validar el formato del DNI
            function validarDNI(dni) {
                var letras = 'TRWAGMYFPDXBNJZSQVHLCKE';

                // Se eliminan los espacios en blanco al inicio y al final del DNI
                dni = dni.trim();

                // Se asegura de que el DNI tenga 9 caracteres
                if (dni.length !== 9) {
                    return false;
                }

                var numero = dni.substring(0, 8);
                var letra = dni.substring(8).toUpperCase();

                // Se verifica que el formato del DNI sea correcto
                if (/^[0-9]{8}[A-Z]$/i.test(dni)) { // Usamos la bandera 'i' para hacer la comparación insensible a mayúsculas/minúsculas
                    var resto = numero % 23;
                    var letraCalculada = letras.charAt(resto);

                    // Se compara la letra calculada con la letra proporcionada
                    return letra === letraCalculada;
                } else {
                    return false;
                }
            }

            // Función para validar el formato de la contraseña
            function validarContraseña(contraseña) {
                // La contraseña debe tener al menos:
                // - 1 carácter en mayúscula
                // - 1 número
                // - 1 carácter en minúscula
                // - Longitud mínima de 6 caracteres
                var mayuscula = /[A-Z]/;
                var minuscula = /[a-z]/;
                var numero = /[0-9]/;
                return mayuscula.test(contraseña) && minuscula.test(contraseña) && numero.test(contraseña) && contraseña.length >= 6;
            }

            // Función para mostrar un mensaje de error debajo del campo
            function mostrarError(campo, mensaje) {
                campo.addClass('is-invalid');
                campo.siblings('.error-message').text(mensaje).show();
            }

            // Función para ocultar el mensaje de error y restablecer el estilo del campo
            function limpiarErrores(campo) {
                campo.removeClass('is-invalid');
                campo.siblings('.error-message').text('').hide();
            }

            // Validar DNI en tiempo real
            $('#dni').on('keyup blur', function() {
                var dni = $(this).val().trim();
                if (dni !== '' && !validarDNI(dni)) {
                    mostrarError($(this), 'DNI no válido.');
                } else {
                    limpiarErrores($(this));
                }
            });

            // Validar contraseña en tiempo real
            $('#contrasena').on('keyup blur', function() {
                var contraseña = $(this).val().trim();
                if (contraseña !== '' && !validarContraseña(contraseña)) {
                    mostrarError($(this), '1 mayús., 1 minús., 1 núm., 6 carac.');
                } else {
                    limpiarErrores($(this));
                }
            });


        });
    </script>
</body>

</html>