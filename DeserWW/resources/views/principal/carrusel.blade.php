<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos de la Carrera</title>
    <link href="{{ asset('css/principalCSS/carrusel.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Fotos de la Carrera</h1>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($fotos as $foto)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset($foto->foto) }}" class="d-block w-100" alt="Foto de la Carrera">
                </div>
            @endforeach
        </div>
    </div>
    <!-- Agrega aquí cualquier script necesario para el carrusel -->
</body>
</html>
