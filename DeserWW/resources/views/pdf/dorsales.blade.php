<!DOCTYPE html>
<html>
<head>
    <title>{{ $carrera->nombre }} - Dorsales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>{{ $carrera->nombre }} - Dorsales</h1>
    
    <table>
        <thead>
            <tr>
                <th>Dorsal</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dorsales as $dorsal)
            <tr>
                <td>{{ $dorsal->dorsal }}</td>
                <td>{{ $dorsal->corredor->nombre }}</td>
                <td>{{ $dorsal->corredor->apellidos }}</td>
                <td><img src="{{ public_path('qr_codes/'.$dorsal->qr) }}" alt="QR Code"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>