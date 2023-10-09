<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor</title>
</head>

<body>
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
            <button type="Sumbit">Enviar</button>
        </form>
    </fieldset>
    <?php
    function mayor(int $num1, int $num2, int $num3): String
    {
        $mayor = $num1;
        if ($num2 > $mayor) {
            $mayor = $num2;
        } 
        if ($num3 > $mayor) {
            $mayor = $num3;
        }
        if ($num1 === $num2 && $num1 === $num3) {
            return " Todos los numeros introducidos son iguales";
        } else {
           return "El valor mas grande es de: $mayor";
        }
    }
    if (($_SERVER["REQUEST_METHOD"]) == "POST") {
        $num1 = (int)$_POST["num1"];
        $num2 = (int)$_POST["num2"];
        $num3 = (int)$_POST["num3"];
        echo mayor($num1, $num2, $num3);
    }
    ?>
</body>

</html>