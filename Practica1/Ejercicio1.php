<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <LINK REL=StyleSheet HREF="style.css" TYPE="text/css">
</head>

<body>
    <div>
        <?php
        for ($i = 1; $i < 11; $i++) {
            echo "<table>
        <thead>
        <tr><th>Tabla del $i</th></tr>
        </thead>
        <tbody>";
            for ($k = 1; $k < 11; $k++) {
                echo "<tr><td>$i x $k =" . $i * $k . "</td></tr>";
            }
            echo "</tbody></table><br>";
        }
        ?>
    </div>
</body>

</html>