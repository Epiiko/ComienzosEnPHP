<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla precios</title>
    <LINK REL=StyleSheet HREF="estilo.css" TYPE="text/css">
</head>

<body>
    <fieldset>
        <legend>Producto a introducir</legend>
        <form action="" method="post">
            <br>
            <label for="nombre">Producto : </label>
            <input type="text" name="nombre">
            <br><br>
            <label for="precio">Precio : </label>
            <input type="text" name="precio">
            <br><br>
            <label for="stock">Stock : </label>
            <input type="number" name="stock">
            <br><br>
            <button type="Sumbit">Enviar</button>
        </form>
    </fieldset>
    <br><br><br>
    <?php
    $productos = [
        ["Camel", 12.33, 3]
    ];
    if (($_SERVER["REQUEST_METHOD"]) == "POST") {
        $precio = (float)$_POST["precio"];
        $nombre = (string)$_POST["nombre"];
        $stock = (int)$_POST["stock"];
        $arrayproducto = [$nombre, $precio, $stock];
            array_push($productos, $arrayproducto);
    }


    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($productos as $item){
                    echo "<tr>";
                    list($name, $price, $cant)=$item;
                    echo "<td>$name</td><td>$price</td><td>$cant</td></tr>";
                }
            ?>
        </tbody>
    </table>
</body>

</html>