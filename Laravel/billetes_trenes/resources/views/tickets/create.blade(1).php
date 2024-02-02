<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Crear un nuevo ticket</h1>
    <form action="{{ route('tickets.index') }}" method="get">
        <input type="submit" value="Volver a inicio">
    </form>
    <br><br>
    <form action="{{ route('tickets.store') }}" method="post">
        @csrf
        <label for="date">Fecha</label>
        <input type="date" name="date">
        <br><br>
        <label for="price">Precio</label>
        <input type="number" step="0.5" name="price">
        <br><br>
        <select name="train" id="train">
            @foreach ($trains as $train)
                <option value="{{ $train->id }}">{{ $train->name }}</option>
            @endforeach
        </select>
        <br><br>
        <select name="ticket_type" id="ticket_type">
            @foreach ($ticket_types as $ticket_type)
                <option value="{{ $ticket_type->id }}">{{ $ticket_type->type }}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
