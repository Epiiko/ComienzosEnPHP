<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <LINK REL=StyleSheet HREF="estilo.css" TYPE="text/css">

</head>

<body>
    <fieldset>
        <legend>Formulario IVA</legend>

        <?php require '../Funciones/muchasfunciones.php';
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            $temp_precio = $_POST["precio"];
            $tipoiva = $_POST["tipo"];
            if (strlen($temp_precio) > 0) {
                if (is_numeric($temp_precio)) {
                    if ((int)$temp_precio > 0) {
                        $precio = $temp_precio;
                        $preciofinal = precioConIva($precio, $tipoiva);
                        echo "<br>El precio con el IVA: $preciofinal €";
                    } else {
                        $err_precio = "El precio debe de ser mayor a 0";
                    }
                } else {
                    $err_precio = "Precio debe de ser tipo numerico";
                }
            } else {
                $err_precio = "El precio debe estar completo";
            }
        }

        ?>
        <form action="" method="post">
            <br>
            <label for="num1">Precio : </label>
            <input type="number" name="precio">
            <?php if (isset($err_precio)) echo $err_precio; ?>
            <br><br>
            <select name="tipo" id="tipo">
                <option value="SIN IVA">Sin IVA</option>
                <option value="REDUCIDO">IVA reducido</option>
                <option value="GENERAL">IVA general</option>
                <option value="SUPERREDUCIDO">IVA superreducido</option>
            </select>
            <br><br>
            <button type="Sumbit">Enviar</button>
        </form>
    </fieldset>
</body>

</html>