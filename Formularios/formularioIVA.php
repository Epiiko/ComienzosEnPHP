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
        <form action="" method="post">
            <br>
            <label for="num1">Precio : </label>
            <input type="number" name="precio">
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
        <?php require 'funcionIVA.php';
         if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            $precio = (int)$_POST["precio"];
            $tipoiva = (String)$_POST["tipo"];
            $preciofinal=precioConIva($precio, $tipoiva);
            echo "<br>El precio con el IVA: $preciofinal €"; 
        }
        ?>
    </fieldset>
</body>
</html>