<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    function sumaDosV1(int $num1, int $num2)
    {
        return $num1 + $num2;
    }
    $res = sumaDosV1(1, 3);
    echo "<h3>Resultado: $res</h3>";
    echo "<h3> Resultado: " . sumaDosV1(2, 6) . "</h3>";
    function sumaDosV2(int | float $num1, int | float $num2)
    {
        return $num1 + $num2;
    }
    $res = sumaDosV2(1.5, 3);
    echo "<h3> Resultado: $res </h3>";
    echo "<h3> Resultado: " . sumaDosV1(1.5, 3) . "</h3>";
    function sumaDosV3(int $num1, int $num2): string
    {
        return "<h1> El resultado es de: " . $num1 + $num2 . "</h1>";
    }
    $res = sumaDosV3(1.5, 3);
    echo $res;
    /*--------------Funcion 1---------------*/
    echo "<h1>EJERCICIO 1</h1>";
    $estudiantes = array(
        ["Paco", 0],
        ["Juan", 0],
        ["Paquito", 0],
        ["Manuel", 0],
        ["Samu", 0]
    );
    ?>
    <br><br>
    <table border=1>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            array_multisort(
                array_column($estudiantes, 0),
                SORT_ASC,
                $estudiantes
            );
            function asignarNota(int $nota)
            {
                return match (true) {
                    $nota < 5 => "Suspenso",
                    $nota == 5 => "Suficiente",
                    $nota < 7 => "Bien",
                    $nota < 9 => "Notable",
                    $nota <= 10 => "Sobresaliente"
                };
            }
            foreach ($estudiantes as $individuo) {
                list($nombre, $nota) = $individuo;
                $nota = rand(0, 10);
                echo "<tr>
            <td>$nombre</td>
            <td>$nota</td>
            <td>" . asignarNota($nota) . "</td>";
            }
            ?>
        </tbody>
    </table>
    <?php
    /*--------------Funcion 2---------------*/
    echo "<h1> Ejercicio 2 </h1>";
    echo "<p> Saca los primeros x numeros primos </p>";
    function esPrimo(int $numero): bool
    {
        if (pow(sqrt($numero), 2) == $numero) {
            return true;
        } else {
            return false;
        }
    }
    function primos(int $cantidad): array
    {
        $listaprimos = [];
        $numprimos = 0;
        for ($x = 2; $numprimos < $cantidad; $x++) {
            if (esPrimo($x)) {
                array_push($listaprimos, $x);
                $numprimos++;
            }
        }
        return $listaprimos;
    }
    echo "<ul>";
    foreach (primos(10) as $primo) {
        echo "<li>$primo</li>";
    }
    echo  "</ul>";


    function celsiusAFarenheit(int|float $temperatura): int |float
    {
        return ($temperatura * 1.8) + 32;
    }
    function FarenheitACelsius(int|float $temperatura): int |float
    {
        return ($temperatura - 32) / 1.8;
    }
    function celsiusAKelvin(int|float $temperatura): int |float
    {
        return ($temperatura + 273.15);
    }
    function kelvinACelsius(int|float $temperatura): int |float
    {
        return ($temperatura - 273.15);
    }
    function kelvinAFarenheit(int|float $temperatura): int |float
    {
        return 1.8 * ($temperatura - 273.15) + 32;
    }
    function FarenheitAKelvin(int|float $temperatura): int |float
    {
        return (5 / 9) * ($temperatura - 32) + 273.15;
    }
    echo FarenheitAKelvin(-1.2) . "<br>";
    echo FarenheitAKelvin(0) . "<br>";
    echo FarenheitAKelvin(10) . "<br>";
    function conversor(float|int $valor, string $u1, string $u2): float | string/*mala praxis*/
    {
        $u1 = strtoupper($u1);
        $u2 = strtoupper($u2);
        return match (true) {
            $u1 == $u2 => "Es la misma retrasao",
            $u1 == "C" and $u2 = "F" => celsiusAFarenheit($valor),
            $u1 == "F" and $u2 = "C" => FarenheitACelsius($valor),
            $u1 == "C" and $u2 = "K" => celsiusAKelvin($valor),
            $u1 == "K" and $u2 = "C" => kelvinACelsius($valor),
            $u1 == "K" and $u2 = "F" => kelvinAFarenheit($valor),
            $u1 == "F" and $u2 = "K" => FarenheitAKelvin($valor),
            default => "Error subnormal"
        };
    }
    echo conversor(0, "c", "F");
    ?>
    <br><br>

    <h1>POTENCIAS</h1>
    <?php
    function potencia(int $num1, int $num2): float
    {
        $res = 1;
        if (($num1 == 0 && $num2 == 0) || $num2 < 0) {
            return -10000;
        }
        for ($i = 0; $i < $num2; $i++) {
            $res *= $num1;
        }
        return $res;
    }
    echo potencia(4, 4);
    ?>
</body>

</html>