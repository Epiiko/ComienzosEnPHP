<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Crear un nuevo tren</h1>
    <form action="{{ route('trains.index') }}" method="get">
        <input type="submit" value="Volver a inicio">
    </form>
    <br><br>
    <form action="{{ route('trains.store') }}" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" name="name">
        <br><br>
        <label for="passengers">Pasajeros</label>
        <input type="number" step="1" name="passengers">
        <br><br>
        <label for="year">Año del tren</label>
        <input type="number" step="1" name="year">
        <br><br>
        <select name="train_type" id="train">
            @foreach ($train_types as $train_type)
                <option value="{{ $train_type->id }}">{{ $train_type->type }}</option>
            @endforeach
        </select>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
