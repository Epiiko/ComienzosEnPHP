<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <LINK REL=StyleSheet HREF="estilo.css" TYPE="text/css">
    <?php require "funcionIVA.php"; ?>

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
    <?php
    function salarioIrpf(float $salario): float
    {
        $devengo = 0;
        $salariof = $salario;
        if ($salariof < 12.450) {
            $devengo += ($salariof * 0.19);
        } else if ($salariof < 20.200) {
            $devengo += (12450 * 0.19);
            $salariof -= 12450;
            $devengo += ($salariof * 0.24);
        } else if ($salariof < 35200) {
            $devengo += (12450 * 0.19);
            $salariof -= 12450;
            $devengo += (20200 * 0.24);
            $salariof -= 20200;
            $devengo += ($salariof * 0.3);
        } else if ($salariof < 60000) {
            $devengo += (12450 * 0.19);
            $salariof -= 12450;
            $devengo += (20200 * 0.24);
            $salariof -= 20200;
            $devengo += (35200 * 0.3);
            $salariof -= 35200;
            $devengo += ($salariof * 0.37);
        } else if ($salariof > 300000) {
            $devengo += (12450 * 0.19);
            $salariof -= 12450;
            $devengo += (20200 * 0.24);
            $salariof -= 20200;
            $devengo += (35200 * 0.3);
            $salariof -= 35200;
            $devengo += ($salariof * 0.37);
            $salariof -= 300000;
            $devengo += ($salariof * 0.45);
        }
        return $salario - $devengo;
    }
    ?>
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