<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php require '../Funciones/funcionesVarias.php'; ?>
    <link href="../CSS/style.css" rel="stylesheet">
</head>

<body>
    <fieldset>
        <legend>Ejercicio1</legend>
        <form action="" method="post">
            <label for="dinero">Cantidad: </label>
            <input type="text" name="dinero">
            <br><br>
            <label><input type="radio" name="divisa1" value="euro">Euros</label>
            <label><input type="radio" name="divisa1" value="dolar">Dolares </label>
            <label><input type="radio" name="divisa1" value="yen">Yenes</label>
            <br><br>
            <label><input type="radio" name="divisa2" value="euro">Euros</label>
            <label><input type="radio" name="divisa2" value="dolar">Dolares </label>
            <label><input type="radio" name="divisa2" value="yen">Yenes</label>
            <input type="hidden" name="action" value="conversor">
            <button type="sumbit" value="convertir">Convertir</button>
        </form>
        <?php
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            if ($_POST["action"] == "conversor") {
                $cantidad = (int)$_POST["dinero"];
                $tipo1 = (string)$_POST["divisa1"];
                $tipo2 = (string)$_POST["divisa2"];
                $cantidadfinal = conversor($cantidad, $tipo1, $tipo2);
                echo "<br>Al cambio sale: $cantidadfinal";
            }
        }
        ?>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Ejercicio2</legend>
        <form action="" method="post">
            <label for="numero">Numero: </label>
            <input type="text" name="numero">
            <br><br>
            <select name="calculo" id="calculo">
                <option value="sumatorio">Sumatorio</option>
                <option value="factorial">Factorial</option>
            </select>
            <br><br>
            <input type="hidden" name="action" value="calculos">
            <button type="sumbit" value="mates">Matemáticas</button>
        </form>
        <?php
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            if ($_POST["action"] == "calculos") {
                $numero = (int)$_POST["numero"];
                $calculo = (string)$_POST["calculo"];
                $res = eleccionCalculo($numero, $calculo);
                echo $res;
            }
        }
        ?>
    </fieldset>
        <?php
        $animales = [
            ["Lobo ibérico", "Mamífero", 2500],
            ["Lince ibérico", "Mamífero", 1668],
            ["Quebrantahuesos", "Ave", 2000],
            ["Oso pardo", "Mamífero", 500]
        ]
        ?>
        <br><br>
        <fieldset>
            <legend>Ejercicio3</legend>
            <form action="" method="post">
                <label for="searchanimal">Animal: </label>
                <input type="text" name="searchanimal">
                <br><br>
                <input type="hidden" name="action" value="animales">
                <button type="sumbit" value="mates">Buscar</button>
                <br><br>
            </form>
            <?php
            if (($_SERVER["REQUEST_METHOD"]) == "POST") {
                if ($_POST["action"] == "animales") {
                    $nombre = (string)$_POST["searchanimal"];
                    foreach($animales as $animal){
                        list($nombre_animal,$tipo,$cantidad)=$animal;
                        if($nombre_animal==$nombre){
                            echo "El animal $nombre esta ", comprobarEstado($nombre_animal),"<br><br>";
                        }
                    }
                }
            }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Tipo</th>
                        <th>Existencias</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($animales as $animal) {
                        echo "<tr>";
                        list($nombre_animal, $tipo, $existencias) = $animal;
                        echo "<td>$nombre_animal</td><td>$tipo</td><td>$existencias</td>
                        <td>",
                        comprobarEstado($existencias), "</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
</body>

</html>