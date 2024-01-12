<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Bebida</title>
</head>
<body>
    <h1>Ver Bebidas</h1>
    <p>Bebida: {{ $bebida->nombre }}</p>
    <p>Precio: {{ $bebida->precio }}</p>
    <p>Tipo: {{ $bebida->tipo }}</p>
</body>
</html>