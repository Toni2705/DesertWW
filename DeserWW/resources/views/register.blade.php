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
                <form action="{{ route('guardar-corredor') }}" method="POST" id="register-form">
                    @csrf

                    <!-- Campo de DNI -->
                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <div class="error-message ml-2 d-inline-block"></div>
                        <input type="text" id="dni" name="dni" required class="form-control">
                    </div>

                    <!-- Campo de nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required class="form-control">
                    </div>

                    <!-- Campo de apellidos -->
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" required class="form-control">
                    </div>

                    <!-- Campo de contraseña -->
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" required class="form-control">
                        <div class="error-message"></div>
                    </div>
            </div>
            <div class="col-md-6">
                <!-- Campo de dirección -->
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required class="form-control">
                </div>

                <!-- Campo de fecha de nacimiento -->
                <div class="form-group">
                    <label for="nacimiento">Fecha de nacimiento:</label>
                    <div class="error-message ml-2 d-inline-block"></div>
                    <input type="date" id="nacimiento" name="nacimiento" required class="form-control">
                </div>

                <!-- Campo de nivel -->
                <div class="form-group">
                    <label for="nivel">Nivel:</label>
                    <select name="nivel" id="nivel" class="form-control">
                        <option value="OPEN" selected>OPEN</option>
                        <option value="PRO">PRO</option>
                    </select>
                </div>

                <!-- Campo de número de federado (solo visible si el nivel es PRO) -->
                <div class="form-group" id="numero_federado_div">
                    <label for="numero_federado">Número de federado (PRO):</label>
                    <input type="text" id="numero_federado" name="numero_federado" class="form-control" disabled>
                </div>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Registrarse</button>
            </div>
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

                dni = dni.trim();

                var numero = dni.substring(0, 8);
                var letra = dni.substring(8).toUpperCase();

                if (/^[0-9]{8}[A-Z]$/i.test(dni)) {
                    var resto = numero % 23;
                    var letraCalculada = letras.charAt(resto);

                    if (letra !== letraCalculada) {
                        mostrarError($('#dni'), 'DNI no válido.');
                        return false;
                    }
                } else {
                    mostrarError($('#dni'), 'DNI no válido.');
                    return false;
                }

                limpiarErrores($('#dni'));
                return true;
            }

            // Función para validar el formato de la contraseña
            function validarContraseña(contraseña) {
                var mayuscula = /[A-Z]/;
                var minuscula = /[a-z]/;
                var numero = /[0-9]/;
                if (!mayuscula.test(contraseña) || !minuscula.test(contraseña) || !numero.test(contraseña) || contraseña.length < 6) {
                    mostrarError($('#contrasena'), '6 cara. (mayús., minús., núm.).');
                    return false;
                } else {
                    limpiarErrores($('#contrasena'));
                    return true;
                }
            }

            // Función para validar la edad del usuario
            function validarEdad(fechaNacimiento) {
                var fechaNacimientoDate = new Date(fechaNacimiento);
                var hoy = new Date();
                var edad = hoy.getFullYear() - fechaNacimientoDate.getFullYear();
                var mes = hoy.getMonth() - fechaNacimientoDate.getMonth();
                if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimientoDate.getDate())) {
                    edad--;
                }
                if (edad < 16) {
                    mostrarError($('#nacimiento'), '<16 años.');
                    return false;
                } else {
                    limpiarErrores($('#nacimiento'));
                    return true;
                }
            }

            // Función para mostrar un mensaje de error debajo del campo
            function mostrarError(campo, mensaje) {
                campo.addClass('is-invalid');
                campo.siblings('.error-message').text(mensaje).show();
                $('#submit-btn').prop('disabled', true);
            }

            // Función para ocultar el mensaje de error y restablecer el estilo del campo
            function limpiarErrores(campo) {
                campo.removeClass('is-invalid');
                campo.siblings('.error-message').text('').hide();
                var errores = $('.error-message:visible').length;
                if (errores === 0) {
                    $('#submit-btn').prop('disabled', false);
                }
            }

            // Función para habilitar o deshabilitar el botón de registro
            function actualizarEstadoBotonRegistro() {
                var dni = $('#dni').val().trim();
                var contraseña = $('#contrasena').val().trim();
                var fechaNacimiento = $('#nacimiento').val();

                var dniValido = validarDNI(dni);
                var contraseñaValida = validarContraseña(contraseña);
                var edadValida = validarEdad(fechaNacimiento);

                // Si todos los campos son válidos, habilitar el botón de registro
                if (dniValido && contraseñaValida && edadValida) {
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#submit-btn').prop('disabled', true);
                }
            }

            // Validar campos en tiempo real
            $('input, select').on('keyup change blur', function() {
                actualizarEstadoBotonRegistro();
            });

        });
    </script>

    <!-- <script>
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

                dni = dni.trim();

                if (dni.length !== 9) {
                    return false;
                }

                var numero = dni.substring(0, 8);
                var letra = dni.substring(8).toUpperCase();

                if (/^[0-9]{8}[A-Z]$/i.test(dni)) {
                    var resto = numero % 23;
                    var letraCalculada = letras.charAt(resto);

                    return letra === letraCalculada;
                } else {
                    return false;
                }
            }

            // Función para validar el formato de la contraseña
            function validarContraseña(contraseña) {
                var mayuscula = /[A-Z]/;
                var minuscula = /[a-z]/;
                var numero = /[0-9]/;
                return mayuscula.test(contraseña) && minuscula.test(contraseña) && numero.test(contraseña) && contraseña.length >= 6;
            }

            // Función para validar la edad del usuario
            function validarEdad(fechaNacimiento) {
                var fechaNacimientoDate = new Date(fechaNacimiento);
                var hoy = new Date();
                var edad = hoy.getFullYear() - fechaNacimientoDate.getFullYear();
                var mes = hoy.getMonth() - fechaNacimientoDate.getMonth();
                if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimientoDate.getDate())) {
                    edad--;
                }
                return edad >= 16;
            }

            // Función para habilitar o deshabilitar el botón de registro
            function actualizarEstadoBotonRegistro() {
                var dni = $('#dni').val().trim();
                var contraseña = $('#contrasena').val().trim();
                var fechaNacimiento = $('#nacimiento').val();

                var dniValido = dni === '' || validarDNI(dni);
                var contraseñaValida = contraseña === '' || validarContraseña(contraseña);
                var edadValida = fechaNacimiento === '' || validarEdad(fechaNacimiento);

                // Si todos los campos son válidos o están vacíos, habilitar el botón de registro; de lo contrario, deshabilitarlo
                if (dniValido && contraseñaValida && edadValida) {
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#submit-btn').prop('disabled', true);
                }
            }

            // Validar campos en tiempo real
            $('input, select').on('keyup change blur', function() {
                actualizarEstadoBotonRegistro();
            });

            // Llamar a la función de actualización una vez para inicializar el estado del botón de registro
            actualizarEstadoBotonRegistro();

        });
    </script> -->

    <!-- <script>
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

                dni = dni.trim();

                if (dni.length !== 9) {
                    return false;
                }

                var numero = dni.substring(0, 8);
                var letra = dni.substring(8).toUpperCase();

                if (/^[0-9]{8}[A-Z]$/i.test(dni)) {
                    var resto = numero % 23;
                    var letraCalculada = letras.charAt(resto);

                    return letra === letraCalculada;
                } else {
                    return false;
                }
            }

            // Función para validar el formato de la contraseña
            function validarContraseña(contraseña) {
                var mayuscula = /[A-Z]/;
                var minuscula = /[a-z]/;
                var numero = /[0-9]/;
                return mayuscula.test(contraseña) && minuscula.test(contraseña) && numero.test(contraseña) && contraseña.length >= 6;
            }

            // Función para validar la edad del usuario
            function validarEdad(fechaNacimiento) {
                var fechaNacimientoDate = new Date(fechaNacimiento);
                var hoy = new Date();
                var edad = hoy.getFullYear() - fechaNacimientoDate.getFullYear();
                var mes = hoy.getMonth() - fechaNacimientoDate.getMonth();
                if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimientoDate.getDate())) {
                    edad--;
                }
                return edad >= 16;
            }

            // Función para habilitar o deshabilitar el botón de registro
            function actualizarEstadoBotonRegistro() {
                var dni = $('#dni').val().trim();
                var contraseña = $('#contrasena').val().trim();
                var fechaNacimiento = $('#nacimiento').val();

                var dniValido = validarDNI(dni);
                var contraseñaValida = validarContraseña(contraseña);
                var edadValida = validarEdad(fechaNacimiento);

                // Si todos los campos son válidos, habilitar el botón de registro; de lo contrario, deshabilitarlo
                if (dniValido && contraseñaValida && edadValida) {
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#submit-btn').prop('disabled', true);
                }
            }

            // Validar campos en tiempo real
            $('input, select').on('keyup change blur', function() {
                actualizarEstadoBotonRegistro();
            });

        });
    </script> -->


</body>

</html>