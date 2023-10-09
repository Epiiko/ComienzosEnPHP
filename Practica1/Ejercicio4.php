<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="style.css" TYPE="text/css">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php
    $numerines = [
        []
    ];
    $numeracion1 = [];
    $numeracion2 = [];
    for ($i = 0; $i < 10; $i++) {
        array_push($numeracion1, rand(1, 10));
        array_push($numeracion2, rand(10, 100));
    }
    $numerines[0] = $numeracion1;
    $numerines[1] = $numeracion2;
    ?>
    <table>
        <thead>
            <th>Rand 1-10</th>
            <th>Rand 10-100</th>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($numeracion1); $i++) {
                echo "<tr>";
                for ($k = 0; $k < count($numerines); $k++) {
                    echo "<td>" . $numerines[$k][$i] . "</td>";
                   
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <fieldset>
        <legend>Rand 1-10</legend>
        <ul>
            <?php
            $maximo = 0;
            $minimo = 11;
            $sumatorio = 0;
            foreach ($numeracion1 as $num) {
                if ($num > $maximo) $maximo = $num;
                if ($num < $minimo) $minimo = $num;
                $sumatorio += $num;
            }
            echo "<li>Número maximo :  $maximo </li><br>
            <li>Número maximo:  $minimo </li><br>
            <li>Media: " . $sumatorio / count($numeracion1) . "</li>";
            ?>
        </ul>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Rand 10-100</legend>
        <ul>
            <?php
            $maximo2 = 0;
            $minimo2 = 11;
            $sumatorio2 = 0;
            foreach ($numeracion2 as $num) {
                if ($num > $maximo) $maximo = $num;
                if ($num < $minimo) $minimo = $num;
                $sumatorio += $num;
            }
            echo "<li>Número maximo :  $maximo </li><br>
            <li>Número maximo:  $minimo </li><br>
            <li>Media: " . $sumatorio / count($numeracion1) . "</li>";
            ?>
        </ul>
    </fieldset>
</body>

</html>