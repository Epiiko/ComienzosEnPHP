<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Editar el  ticket {{$ticket->id}}</h1>
    <form action="{{ route('tickets.index') }}" method="get">
        <input type="submit" value="Volver a inicio">
    </form>
   
    <br><br>
    <form action="{{ route('tickets.update',['ticket'=>$ticket->id]) }}" method="post">
        @csrf
        {{method_field("PUT")}}
        <label for="date">Fecha</label>
        <input type="date" name="date" value={{$ticket->date}}>
        <br><br>
        <label for="price">Precio</label>
        <input type="number" step="0.5" name="price" value={{$ticket->price}}>
        <br><br>
        <select name="train" id="train">
            @foreach ($trains as $train)
                <option @if($train->id==$ticket->train_id) selected @endif value="{{ $train->id }}">{{ $train->name }}</option>
            @endforeach
        </select>
        <br><br>
        <select name="ticket_type" id="ticket_type">
            @foreach ($ticket_types as $ticket_type)
                <option value="{{ $ticket_type->id }}">{{ $ticket_type->type }}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" value="Editar">
    </form>
</body>

</html>
