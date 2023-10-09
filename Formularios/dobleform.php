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
                    echo "<br><p>El salario con IRPF se queda en: ".SalarioIrpf($salario)."€</p>";
                }
            }
            ?>
        </form>
    </fieldset>
</body>

</html>