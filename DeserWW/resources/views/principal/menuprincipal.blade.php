<?php
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesertWW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .next-race-container {
            background-color: rgba(255, 165, 0, 0.7); /* Fondo naranja transparente */
            color: black; /* Color del texto */
            padding: 20px; /* Espaciado interno */
            height: 90px;
            line-height: 100%; /* Alinear verticalmente */
        }
        h5{
            line-height: 100%;
        }
        #carrera{
            height: 50px;
            width: 75px;
        }
        #countdown{
            font-size: 18px;
        }
        .container{
            margin-top: 20px;
            text-align: center;
        }
        .card{
            color: white;
        }
        .imgCartel{
        width: 270px;
        height: 450px;
        padding-top: 15px;
        }
        .card-body{
            width: 300px;
            height: 500px;
        }
        a{
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    
@if (Auth::check())
    @include('principal/headerLogeado')
@else
    @include('principal/headerPrincipal')
@endif

<div class="next-race-container">
    @if ($proximaCarrera)
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <h5 ><img src="{{ asset('images/flag.png') }}" alt="Bandera de Carreras" id="carrera"> {{ $proximaCarrera->nombre }}</h5>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end" id="countdown"></div>
        </div>
        <script>
                // Obtenemos la fecha de inicio de la próxima carrera
                var fechaInicio = new Date("{{ $proximaCarrera->fecha_inicio }}").getTime();

                // Actualizamos el contador cada segundo
                var x = setInterval(function() {

                    // Obtenemos la fecha y hora actual
                    var ahora = new Date().getTime();
                    
                    // Calculamos la diferencia entre la fecha de inicio y la fecha actual
                    var diferencia = fechaInicio - ahora;
                    
                    // Calculamos días, horas, minutos y segundos
                    var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
                    var horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
                    var segundos = Math.floor((diferencia % (1000 * 60)) / 1000);
                    
                    // Mostramos el contador en el elemento con id "countdown"
                    document.getElementById("countdown").innerHTML = " <strong>Next Race:  "+ dias + "d " + horas + "h " + minutos + "m " + segundos + "s </strong>";
                    
                    // Si la cuenta regresiva ha terminado, mostramos un mensaje
                    if (diferencia < 0) {
                        clearInterval(x);
                        document.getElementById("countdown").innerHTML = "¡La carrera ha comenzado!";
                    }
                }, 1000);
    </script>
        <!-- Mostrar más detalles de la carrera según tus necesidades -->
    @else
        <p>No hay próximas carreras programadas.</p>
    @endif

</div>
<div class="container">
    <div class="row justify-content-center">
        @for($i = 0; $i < count($datos) && $i < 4; $i++)
        <div class="col-md-3 mb-4">
            <div class="card bg-dark">
                <a href="{{ route('carrera-info', ['id' => $datos[$i]->id]) }}"><div class="card-body">
                    {{ $datos[$i]->nombre }}
                    <img src="{{ asset($datos[$i]->cartel) }}" alt="Cartel de {{ $datos[$i]->nombre }}" class="imgCartel">
                </div></a>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- AQUI VA A IR EL FOOTER Y LOS SPONSORS QUE SON PRINCIPALES (SU LOGO) -->

<!-- <div class="container">
    <div class="row justify-content-center">
        @foreach($sponsors as $sponsor)        
            <div class="col-md-3 mb-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        {{ $sponsor->nombre }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> -->

</body>
</html>