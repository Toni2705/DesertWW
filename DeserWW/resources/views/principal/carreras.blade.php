<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesertWW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tittle {
            background-color: rgba(255, 165, 0, 0.7);
            /* Fondo naranja transparente */
            color: black;
            /* Color del texto */
            padding: 20px;
            /* Espaciado interno */
            height: 90px;
            line-height: 100%;
            /* Alinear verticalmente */
        }

        h5 {
            line-height: 100%;
        }

        #carrera {
            height: 50px;
            width: 75px;
        }

        #countdown {
            font-size: 18px;
        }

        .container {
            margin-top: 20px;
            text-align: center;
        }

        .card {
            color: white;
        }

        .imgCartel {
            width: 270px;
            height: 450px;
            padding-top: 15px;
        }

        .card-body {
            width: 300px;
            height: 500px;
        }
    </style>
</head>

<body>

    @if (Auth::check())
    @include('principal/headerLogeado')
    @else
    @include('principal/headerPrincipal')
    @endif

    <div class="tittle d-flex align-items-center justify-content-center">
        <h5>Nuestras Carreras</h5>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach($datos as $carrera)
            <!-- Comprobar si la carrera ha pasado -->
            @php
            $fechaInicio = \Carbon\Carbon::parse($carrera->fecha_inicio);
            $hoy = \Carbon\Carbon::today();
            $colorTitulo = '';
            if ($fechaInicio->lt($hoy)) {
            $colorTitulo = 'text-danger'; // Carrera pasada
            }
            @endphp
            <div class="col-md-3 mb-4">
                <div class="card bg-dark">
                    <a href="{{ route('carrera-info', ['id' => $carrera->id]) }}" class="{{ $colorTitulo }}">
                        <div class="card-body">
                            {{ $carrera->nombre }}
                            <img src="{{ asset($carrera->cartel) }}" alt="Cartel de {{ $carrera->nombre }}" class="imgCartel">
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
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