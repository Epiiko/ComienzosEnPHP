<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tipo de tickets</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Tipos de ticket</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($train_types as $train_type)
                <tr>
                    <td>{{ $train_type->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
