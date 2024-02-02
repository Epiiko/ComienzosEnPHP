<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('trains.index') }}" method="get">
        <input type="submit" value="Volver a inicio">
    </form>
    <h1>Nombre {{$train->name}}</h1>
    <h3>Capacidad para: {{$train->passengers}} pasajeros</h3>
    <h3>Año del tren: {{$train->year}}</h3>
    <h3>Tipo de tren: {{$train->train_type->type}}</h3>
</body>
</html>