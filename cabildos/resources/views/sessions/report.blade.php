<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table border="1">
        <thead>
            <th>Tema</th>
            <th>Descripción</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            @foreach ($cabildos as $i)
            <tr>
                <td> {{ $i->nombre_tema }}</td>
                <td> {{ $i->description }}</td>
                <td> {{ $i->nombre_dep }}</td>
                <td> {{ $i->nombre_ciu }}</td>
                <td> {{ $i->fecha_realizacion }}</td>
            </tr>
            @endforeach
    
        </tbody>
    </table>
</body>
</html>

   