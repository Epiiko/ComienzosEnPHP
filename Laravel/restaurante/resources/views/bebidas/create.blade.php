<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Plato</title>
</head>
<body>
    <form method="post" action="{{route('bebidas.store')}}">
        @csrf
        <label>Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label>Precio: </label>
        <input type="number" step="0.1" name="precio"><br><br>
        <label>Tipo: </label>
        <select name="tipo">
            <option value="Lata">Lata</option>
            <option value="Botellin">Botellin</option>
            <option value="Botella">Botella</option>
        </select>
        <br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>