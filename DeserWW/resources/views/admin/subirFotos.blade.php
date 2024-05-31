<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Fotos</title>
    <link href="{{ asset('css/subirFoto.css') }}" rel="stylesheet">
</head>

<body>
    <form id="image-upload-form" action="{{ route('carrera.fotos.store', ['carrera_id' => $carrera]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="drop-area" ondragover="dragOverHandler(event);" ondrop="dropHandler(event);" ondragenter="dragEnterHandler(event);" ondragleave="dragLeaveHandler(event);">
            <h2>Arrastra y suelta tus imágenes aquí</h2>
            <p>O haz clic para seleccionar imágenes</p>
            <input type="file" id="fileInput" multiple accept="image/*" name="imagenes[]" onchange="handleFiles(this.files);">
        </div>
        <button type="submit">Enviar</button>
        <div id="image-preview"></div>
    </form>
    <script src="{{ asset('js/dragImagenes.js') }}"></script>
    
</body>

</html>
