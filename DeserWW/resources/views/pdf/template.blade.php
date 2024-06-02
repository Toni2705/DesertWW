<!DOCTYPE html>
<html>
<head>
    <title>PDF Template</title>
</head>
<body>
    <h1>{{$data['carrera']}}</h1>
    <p>Parámetros:</p>
    <ul>
        @foreach ($data as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>
    <div class="organization-info">
        <h2>Información de la Organización</h2>
        <p><strong>Organización:</strong> Desert World Wide</p>
        <p><strong>Dirección:</strong> Calle Falsa 123, Ciudad X</p>
        <p><strong>Correo electrónico:</strong> info@desertww.com</p>
        <p><strong>Teléfono:</strong> +987654321</p>
    </div>

</body>
</html>