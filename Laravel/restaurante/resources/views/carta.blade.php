<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Carta del Restaurant</h1>

    <h2>
        <h2>El menu del dia consta de {{ $platodia[0] }} con {{ $bebidadia[0] }} por un precio total
            {{ $platodia[1] + $bebidadia[1] }} €</h2>
    </h2>

    <br>
    <br>
    <br>
    <h3>Bebidas</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tamaño</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($bebidas as $bebida)
                @php list($nombre, $precio , $tamano)=$bebida @endphp
                <tr>
                    <td>
                        {{ $nombre }}
                    </td>
                    <td>
                        {{ $precio }}
                    </td>
                    <td>
                        {{ $tamano }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <h3>Platos</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tamaño</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($platos as $plato)
                @php list($nombre, $precio , $tamano)=$plato @endphp
                <tr>
                    <td>
                        {{ $nombre }}
                    </td>
                    <td>
                        {{ $precio }}
                    </td>
                    <td>
                        {{ $tamano }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
