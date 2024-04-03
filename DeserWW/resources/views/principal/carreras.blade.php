<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesertWW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .next-race-container {
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
    @include('principal/headerPrincipal')
    @if ($datos)
    <?php
    var_dump($datos);
    ?>
    @else
    <p>No hay próximas carreras programadas.</p>
    @endif
</body>

</html>