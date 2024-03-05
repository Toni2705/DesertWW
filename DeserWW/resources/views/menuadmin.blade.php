<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin</title>
    <style>
        /* Estilos personalizados */
        body{
            overflow-y: hidden;
            margin: 0;
        }

        #contenidoPrincipal {
            background-image: url('{{ asset("images/fondo.png") }}'); 
            background-size: cover; /* La imagen de fondo cubrirá todo el contenedor sin repetirse */
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            height: 100%;
            text-align: center; /* Centra horizontalmente el contenido */
        }
        .imagen {
            margin-bottom: 20px;
        }
        .img{
            width: 250px;
            height: 310px;
            border-radius: 10%;
            border-style: solid ;
            border-color: black;
        }
    </style>
</head>
@include('headerAdmin')
    <div id="contenidoPrincipal">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="imagen">
                        <img src="{{ asset('images/pilotos.png') }}" alt="Icono" class="img">
                    </div>
                    <div class="imagen">
                        <img src="{{ asset('images/nike.png') }}" alt="Icono" class="img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="imagen">
                        <img src="{{ asset('images/carrera.jpg') }}" alt="Icono" class="img">
                    </div>
                    <div class="imagen">
                        <img src="{{ asset('images/dkv.png') }}" alt="Icono" class="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
