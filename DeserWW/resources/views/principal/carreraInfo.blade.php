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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <h2>{{ $carrera->nombre }}</h2>

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
                    @for($i = 0; $i < count($seguros) && $i < 4; $i++)
                        <option value="{{$seguros[$i]->id}}">{{$seguros[$i]->nombre}}</option>
                    @endfor
                    <!-- Agrega más opciones según necesites -->
                </select>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-success">Inscribirse</button>
        </form>
    </div>

    <script>
        // Evento para mostrar el formulario al hacer clic en el botón "Inscribirse"
        document.getElementById("mostrarFormulario").addEventListener("click", function() {
            document.getElementById("formularioInscripcion").style.display = "block";
        });
    </script>

</body>
</html>