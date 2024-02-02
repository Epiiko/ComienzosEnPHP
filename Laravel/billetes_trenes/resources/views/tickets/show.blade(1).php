<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('tickets.index') }}" method="get">
        <input type="submit" value="Volver a inicio">
    </form>
    <h1>Ticket {{$ticket->id}}</h1>
    <h3>Fecha: {{$ticket->date}}</h3>
    <h3>Nombre del tren: {{$ticket->train_name->name}}</h3>
    <h3>Tipo de billete: {{$ticket->ticket_type->type}}</h3>
</body>
</html>