<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenido al historial de Tickets</h1>
    <form action="{{ route('tickets.create') }}" method="get">
        <input type="submit" value="Crear nuevo ticket">
    </form>
    <br><br>
    <table border="2">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Nº Tren</th>
                <th>Tipo de billete</th>
                <th colspan="3">RUD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->date }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->train_name->name }}</td>
                    <td>{{ $ticket->ticket_type->type }}</td>
                    <td>
                        <form action="{{ route('tickets.show', ['ticket' => $ticket->id]) }}" method="get">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tickets.edit', ['ticket' => $ticket->id]) }}" method="get">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tickets.destroy', ['ticket' => $ticket->id]) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <form action="{{ route('trains.index') }}" method="get" style="display: inline">
        <input type="submit" value="Ver trenes">
    </form>
    <form action="{{ route('train_types.index') }}" method="get"style="display: inline">
        <input type="submit" value="Ver tipo de trenes">
    </form>
    <form action="{{ route('ticket_types.index') }}" method="get" style="display: inline">
        <input type="submit" value="Ver tipo de tickets">
    </form>
</body>

</html>
