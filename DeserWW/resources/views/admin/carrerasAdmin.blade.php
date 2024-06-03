<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarreraAdmin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carrerasAdmin.css') }}" rel="stylesheet">
</head>
@include('admin/headerAdmin')
<body>

    <div class="general mt-5">
        <h2>Carreras</h2>
        <h4><a href="{{ route('agregar-carrera') }}" class="btn btn-primary">Añadir</a></h4>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Desnivel</th>
                        <th>Mapa</th>
                        <th>Participantes</th>
                        <th>Kilómetros</th>
                        <th>Fecha</th>
                        <th>HInicio</th>
                        <th>Salida</th>
                        <th>Cartel</th>
                        <th>Precio</th>
                        <th>Inscripción</th>
                        <th>Sponsor</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                    <tr>
                        <td>{{ $dato->nombre }}</td>
                        <td>{{ $dato->descripcion }}</td>
                        <td>{{ $dato->desnivel }}</td>
                        <td>{{ $dato->mapa }}</td>
                        <td>{{ $dato->max_participantes }}</td>
                        <td>{{ $dato->km }}km</td>
                        <td>{{ $dato->fecha_inicio }}</td>
                        <td>{{ $dato->hora_inicio }}</td>
                        <td>{{ $dato->salida }}</td>
                        <td>{{ $dato->cartel }}</td>
                        <td>{{ $dato->precio_patrocinar }}€</td>
                        <td>{{ $dato->precio_inscripcion }}€</td>
                        <td>{{ $dato->id_sponsor }}</td>
                        <td><a href="{{ route('editar-carrera', ['id' => $dato->id]) }}" class="btn btn-primary">Editar</a></td>
                        @if (Carbon\Carbon::now()->gt($dato->fecha_inicio))
                            <td><a href="{{ route('añadir-fotos', ['id' => $dato->id]) }}" class="btn btn-primary">Añadir fotos</a></td>
                        @endif
                        
                        <td><a href="{{ route('generatePDF', ['id' => $dato->id]) }}" class="btn btn-primary">Dorsales</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="#" onclick="window.history.back();">
                <h5>Volver</h5>
            </a>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
