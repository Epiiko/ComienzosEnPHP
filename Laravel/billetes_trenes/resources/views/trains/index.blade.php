<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido al historial de trenes</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Pasajeros</th>
                <th>Año del tren</th>
                <th>Tipo de tren</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr>
                    <td>{{$train->name}}</td>
                    <td>{{$train->passengers}}</td>
                    <td>{{$train->year}}</td>
                    <td>{{$train->train_type->type}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>