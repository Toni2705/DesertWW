<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsors</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container">
<h2>Patrocinadores</h2>
<h4><a href="{{ route('añadir-sponsor') }}"class="btn btn-primary">Añadir</a></h4>
<table class="table table-bordered">
    <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Descripción</th>
            <th>CIF</th>
            <th>Foto</th>
            <th>Principal</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato)
        <tr>
         
            <td>{{ $dato->nombre }}</td>
            <td>{{ $dato->direccion }}</td>
            <td>{{ $dato->CIF }}</td>
            <td>{{ $dato->logo }}</td>
            <td>{{ $dato->principal }}</td>
            <td><a href="{{ route('editar-sponsor', ['id' => $dato->id]) }}"class="btn btn-primary">Editar</a></td>
        

        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>