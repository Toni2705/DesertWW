$(document).ready(function () {
    $('#nivel').change(function () {
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
    $('#dni').on('keyup blur', function () {
        var dni = $(this).val().trim();
        if (dni !== '' && !validarDNI(dni)) {
            mostrarError($(this), 'DNI no válido.');
        } else {
            limpiarErrores($(this));
        }
    });

    // Validar contraseña en tiempo real
    $('#contrasena').on('keyup blur', function () {
        var contraseña = $(this).val().trim();
        if (contraseña !== '' && !validarContraseña(contraseña)) {
            mostrarError($(this), '1 mayús., 1 minús., 1 núm., 6 carac.');
        } else {
            limpiarErrores($(this));
        }
    });


});