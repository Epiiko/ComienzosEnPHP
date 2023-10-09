<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <LINK REL=StyleSheet HREF="style.css" TYPE="text/css">
</head>

<body>
    <?php
    $temperaturas = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
    ];
    for ($i = 0; $i < count($temperaturas); $i++) {
        $temperaturas[$i][3] = (($temperaturas[$i][1] + $temperaturas[$i][2]) / 2);
    }
    array_multisort(
        array_column($temperaturas, 1),
        SORT_ASC,
        array_column($temperaturas, 0),
        SORT_ASC,
        $temperaturas
    );
    ?>
    <table>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Minima</th>
                <th>Maxima</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sumamaxi = 0;
            $sumamini = 0;
            foreach ($temperaturas as $ciudad) {
                list($nombre, $minima, $maxima, $media) = $ciudad;
                $sumamaxi += $maxima;
                $sumamini += $minima;
                echo "<tr>
                <td>$nombre</td>
                <td>$minima</td>
                <td>$maxima</td>
                <td>$media</td>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <fieldset>
        <legend>Medias temperaturas</legend>
        <ul>
            <?php
            echo "<li>La minima media: " . $sumamini / count($temperaturas) . "</li>";
            echo "<br><br><li>La maxima media: " . $sumamaxi / count($temperaturas) . "</li>";
            ?>
        </ul>
    </fieldset>

</body>

</html>