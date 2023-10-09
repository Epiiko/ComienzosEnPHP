<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="style.css" TYPE="text/css">
    <title>Ejercicio 3</title>

</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Cuadrado perfecto</th>
                <th>Raiz</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cuadrados = 0;
            $listacuadrados=[];
            $i = 1;
            while ($cuadrados < 50) {
                if (pow(intval(sqrt($i)), 2) == $i) {
                    array_push($listacuadrados, $i);
                    echo "<tr>
                        <td>$i</td><td>" . sqrt($i) . "</td>
                        </tr>";
                $cuadrados++;
                }
                $i++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>