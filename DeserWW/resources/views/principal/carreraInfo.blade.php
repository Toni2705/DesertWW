<?php

use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

$idCorredor = Auth::id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $carrera->nombre }}</title>
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
            <button id="mostrarFormulario" class="btn btn-primary">Inscribirse</button>

            <!-- Formulario de inscripción (inicialmente oculto) -->
            <form id="formularioInscripcion" action="{{ route('inscribirse') }}" method="POST" style="display: none;">
                @csrf <!-- Directiva de Blade para incluir el token CSRF -->
                <input type="hidden" name="carrera_id" value="{{ $carrera->id }}">
                @if (Auth::check())
                <input type="hidden" name="corredor_id" value="{{ $idCorredor}}">
                @else
                <input type="hidden" name="corredor_id" value="">
                @endif
                <div class="mb-3">
                    <label for="seguro" class="form-label">Selecciona un seguro:</label>
                    <select name="seguro" id="seguro" class="form-select" required>
                        <option value="" selected disabled>Selecciona un seguro</option>
                        @for($i = 0; $i < count($seguros) && $i < 4; $i++) <option value="{{$seguros[$i]->id}}">{{$seguros[$i]->nombre}}</option>
                            @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Inscribirse</button>
            </form>
        <?php
            // var_dump('SII PUEDES INSCRIBIRTE, QUEDAN MÁS DE 10 DIAS PARA QUE EMPIECE LA CARRERA');
            // echo '<br>';
            // echo $carrera->fecha_inicio;
        } else {
            // var_dump('NO PUEDES INSCRIBIRTE, LA CARRERA YA HA ACABADO O QUEDAN MENOS DE 10 DIAS PARA QUE EMPIECE');
            // echo '<br>';
            // echo $carrera->fecha_inicio;
        }
        ?>
    </div>


    <script>
        // Evento para mostrar el formulario al hacer clic en el botón "Inscribirse"
        document.getElementById("mostrarFormulario").addEventListener("click", function() {
            document.getElementById("formularioInscripcion").style.display = "block";
        });
    </script>

</body>

</html>