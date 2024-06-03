<?php


use Illuminate\Support\Facades\Auth;


$idCorredor = Auth::id();
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $carrera->nombre }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<style>
    .imgCartel {
        width: 270px;
        height: 450px;
        padding-top: 15px;
    }
</style>


<body>
    @if (Auth::check())
        @include('principal/headerLogeado')
    @else
        @include('principal/headerPrincipal')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="informacion">
                    <img src="{{ asset($carrera->cartel) }}" alt="Cartel de {{ $carrera->nombre }}" class="imgCartel">
                </div>
            </div>
            <div class="col-md-6">
                <div class="informacion" style="margin-top: 20px;">
                    <h1>{{ $carrera->nombre }}</h1>
                    <h2>Fecha inicio: {{ date('d-m-Y', strtotime($carrera->fecha_inicio)) }}</h2>
                    <h2>Hora inicio: {{ date('H:i', strtotime($carrera->hora_inicio)) }}</h2>
                    <h5>{{ ucfirst($carrera->descripcion) }}</h5>
                    <h5>Punto de salida: {{ $carrera->salida }}</h5>
                    <h5>Desnivel: {{ $carrera->desnivel }}m</h5>
                    <h5>Km de carrera: {{ $carrera->km }}km</h5>
                    <h5>Precio: {{ $carrera->precio_inscripcion }} €</h5>
                    <img src="{{ asset($carrera->mapa) }}" alt="Mapa de {{ $carrera->nombre }}" class="imgMapa">
                </div>
            </div>
        </div>


        <?php
        if (strtotime($carrera->fecha_inicio) >= strtotime('+10 days')) {
        ?>
            <!-- Botón para mostrar el formulario -->
            <form action="{{ route('comprobacion', ['precio' => $carrera->precio_inscripcion]) }}" method="GET">
                @csrf <!-- Directiva de Blade para incluir el token CSRF -->
                <input type="hidden" name="carrera_id" value="{{ $carrera->id }}">
                @if (Auth::check())
                    <input type="hidden" name="corredor_id" value="{{ $idCorredor}}">
                @else
                <input type="hidden" name="corredor_id" value="">
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
                @endif
                <!-- Campo de selección de seguro -->
                <div class="mb-3">
                    <label for="seguro" class="form-label">Selecciona un seguro:</label>
                    <select name="seguro" id="seguro" class="form-select" required>
                        <option value="" selected disabled>Selecciona un seguro</option>
                        @for($i = 0; $i < count($seguros) && $i < 4; $i++) 
                            <option value="{{$seguros[$i]->id}}">{{$seguros[$i]->nombre}}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Inscribirse</button>
            </form>
        <?php
        } elseif (strtotime($carrera->fecha_inicio) < strtotime('+10 days') && strtotime($carrera->fecha_inicio) > strtotime('+1 days')) {
            echo 'No es posible inscribirse a esta carrera, faltan menos de 10 días para que comience.';
        } elseif (strtotime($carrera->fecha_inicio) <= strtotime('now') && strtotime($carrera->fecha_inicio) > strtotime('-1 day')) {
        ?>
            @if ($dorsalesCompletados->isNotEmpty())
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Clasificación</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre del Corredor</th>
                            <th>Tiempo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dorsalesCompletados as $dorsal)
                            <tr>
                                <td>{{ $dorsal->corredor->nombre }} {{ $dorsal->corredor->apellidos }}</td>
                                <td>{{ $dorsal->tiempo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p>No hay dorsales completados para esta carrera.</p>
    @endif
        <?php
        } else {
            echo 'No es posible inscribirse a esta carrera, ya ha finalizado.';
        }
        ?>
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


            function mostrarError(campo, mensaje) {
                campo.addClass('is-invalid');
                campo.siblings('.error-message').text(mensaje).show();
                $('#submit-btn').prop('disabled', true);
            }


            function limpiarErrores(campo) {
                campo.removeClass('is-invalid');
                campo.siblings('.error-message').text('').hide();
                var errores = $('.error-message:visible').length;
                if (errores === 0) {
                    $('#submit-btn').prop('disabled', false);
                }
            }


            function actualizarEstadoBotonRegistro() {
                var dni = $('#dni').val().trim();
                var fechaNacimiento = $('#nacimiento').val();
                var dniValido = validarDNI(dni);
                var edadValida = validarEdad(fechaNacimiento);
                if (dniValido && edadValida) {
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#submit-btn').prop('disabled', true);
                }
            }


            $('input, select').on('keyup change blur', function() {
                actualizarEstadoBotonRegistro();
            });
        });
    </script>
</body>


</html>





