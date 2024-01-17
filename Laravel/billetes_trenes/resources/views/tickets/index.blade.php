<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a trenes</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Nº Tren</th>
                <th>Tipo de billete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{$ticket->date}}</td>
                    <td>{{$ticket->price}}</td>
                    <td>{{$ticket->train_name->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>