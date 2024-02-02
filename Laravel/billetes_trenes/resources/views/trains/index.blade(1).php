<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Listado de trenes</h1>
    <form action="{{ route('trains.create') }}" method="get">
        <input type="submit" value="Crear nuevo train">
    </form>
    <br><br>
    <table border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Pasajeros</th>
                <th>Año del tren</th>
                <th>Tipo de tren</th>
                <th colspan="3">RUD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr>
                    <td>{{$train->name}}</td>
                    <td>{{$train->passengers}}</td>
                    <td>{{$train->year}}</td>
                    <td>{{$train->train_type->type}}</td>
                    <td>
                        <form action="{{ route('trains.show', ['train' => $train->id]) }}" method="get">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('trains.edit', ['train' => $train->id]) }}" method="get">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('trains.destroy', ['train' => $train->id]) }}" method="POST">
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
    </form>
    <form action="{{ route('train_types.index') }}" method="get"style="display: inline">
        <input type="submit" value="Ver tipo de trenes">
    </form>
    <form action="{{ route('ticket_types.index') }}" method="get" style="display: inline">
        <input type="submit" value="Ver tipo de tickets">
    </form>
    <form action="{{ route('tickets.index') }}" method="get" style="display: inline">
        <input type="submit" value="Ver tickets">
    </form>
</body>
</html>