<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <LINK REL=StyleSheet HREF="estilo.css" TYPE="text/css">
    <?php require "../Funciones/muchasfunciones.php"; ?>

</head>

<body>
    <fieldset>
        <legend>Formulario IVA</legend>
        <form action="" method="post">
            <br>
            <label for="precio">Precio : </label>
            <input type="number" name="precio">
            <br><br>
            <select name="tipo" id="tipo">
                <option value="SIN IVA">Sin IVA</option>
                <option value="REDUCIDO">IVA reducido</option>
                <option value="GENERAL">IVA general</option>
                <option value="SUPERREDUCIDO">IVA superreducido</option>
            </select>
            <br><br>
            <input type="hidden" name="action" value="iva">
            <button type="Sumbit">Enviar</button>
            <br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "iva") {
                    $precio = (int)$_POST["precio"];
                    $tipoiva = (string)$_POST["tipo"];
                    $preciofinal = precioConIva($precio, $tipoiva);
                    echo "<br>El precio con el IVA: $preciofinal €";
                }
            }
            ?>
        </form>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>IRPF</legend>
        <form action="" method="post">
            <br>
            <label for="num1">Salario : </label>
            <input type="number" name="salario">
            <input type="hidden" name="action" value="irpf">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "irpf") {
                    $salario = (float)$_POST["salario"];
                    echo "<br><p>El salario con IRPF se queda en: " . SalarioIrpf($salario) . "€</p>";
                }
            }
            ?>
        </form>
    </fieldset>
    <br><br>
    <?php
    $productos = [
        ["Camel", 12.33, 3]
    ];
    ?>
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
            <input type="hidden" name="action" value="addproduct">
            <input type="submit" value="Add product">
        </form>
        <?php
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            if ($_POST["action"] == "addproduct") {
                $precio = (float)$_POST["precio"];
                $nombre = (string)$_POST["nombre"];
                $stock = (int)$_POST["stock"];
                $arrayproducto = [$nombre, $precio, $stock];
                array_push($productos, $arrayproducto);
            }
        }
        ?>
        <br><br>
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
                foreach ($productos as $item) {
                    echo "<tr>";
                    list($name, $price, $cant) = $item;
                    echo "<td>$name</td><td>$price</td><td>$cant</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Saca el mayor</legend>
        <form action="" method="post">
            <br>
            <label for="num1">Numero 1: </label>
            <input type="number" name="num1">
            <br><br>
            <label for="num2">Numero 2: </label>
            <input type="number" name="num2">
            <br><br>
            <label for="num3">Numero 3: </label>
            <input type="number" name="num3">
            <br><br>
            <input type="hidden" name="action" value="mayor">
            <input type="submit" value="Comparar">
            <br><br>
        </form>
        <?php
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            if ($_POST["action"] == "mayor") {
                $num1 = (int)$_POST["num1"];
                $num2 = (int)$_POST["num2"];
                $num3 = (int)$_POST["num3"];
                echo mayor ($num1, $num2, $num3);
            }
        }
        ?>
    </fieldset>
</body>

</html>