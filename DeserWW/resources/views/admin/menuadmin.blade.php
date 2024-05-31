<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin</title>
    <link href="{{ asset('css/menuAdmin.css') }}" rel="stylesheet">
    
</head>
@include('admin/headerAdmin')
<div id="contenidoPrincipal">
    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-6">
                <div class="imagen">
                    <a href="{{ route('mostrar-corredores') }}">
                        <img src="{{ asset('images/pilotos.png') }}" alt="Icono" class="img">
                    </a>
                </div>
                <div class="imagen">
                <a href="{{ route('mostrar-sponsor') }}">
                    <img src="{{ asset('images/nike.png') }}" alt="Icono" class="img">
                </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="imagen">
                    <a href="{{ route('mostrar-datos') }}">
                        <img src="{{ asset('images/carrera.jpg') }}" alt="Icono" class="img">
                    </a>
                </div>
                <div class="imagen">
                    <a href="{{ route('mostrar-seguros') }}">
                        <img src="{{ asset('images/dkv.png') }}" alt="Icono" class="img">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>