<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Editar tren {{ $train->id }}</h1>
    <form action="{{ route('trains.index') }}" method="get">
        <input type="submit" value="Volver a inicio">
    </form>
    <br><br>
    <form action="{{ route('trains.update', ['train' => $train->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ $train->name }}">
        <br><br>
        <label for="passengers">Pasajeros</label>
        <input type="number" step="1" name="passengers" value="{{ $train->passengers }}">
        <br><br>
        <label for="year">Año del tren</label>
        <input type="number" step="1" name="year" value="{{ $train->year }}">
        <br><br>
        <select name="train_type" id="train">
            @foreach ($train_types as $train_type)
                <option @if ($train->train_type_id == $train_type->id) selected @endif value="{{ $train_type->id }}">
                    {{ $train_type->type }}</option>
            @endforeach
        </select>
        <input type="submit" value="Editar">
    </form>
</body>
</body>

</html>
