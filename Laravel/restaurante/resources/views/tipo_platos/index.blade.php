<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenido a los tipos de plato</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos_platos as $tipo_plato)
                <tr>
                    <td>{{ $tipo_plato->id }}</td>
                    <td>{{ $tipo_plato->tipo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <ul>
        @foreach ($tipos_platos as $tipo_plato)
            <li>{{ $tipo_plato->tipo }}</li>
            <ul>
                @php
                    $platos= $tipo_plato-> platos;
                @endphp
                @foreach($platos as $plato)
                 <li>{{$plato}}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>

</body>

</html>
