<!DOCTYPE html>
<html lang="en">
<LINK REL=StyleSheet HREF="estilo.css" TYPE="text/css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //-------------EJERCICIO 1----------------//
    echo "<h1> Ejercicio 1 </h1>";
    $n1 = rand(1, 10);
    if ($n1 % 2 == 0) {
        echo "El numero " . $n1 . " es par";
    } else {
        echo "El numero " . $n1 . " es impar";
    }

    //-------------EJERCICIO 2----------------//
    echo "<h1> Ejercicio 2 </h1>";
    $n2 = rand(-10, 10);
    if ($n2 > 0) {
        echo "El nuemero " . $n2 . " es positivo";
    } elseif ($n2 === 0) {
        echo "El numero es cero";
    } else {
        echo "El numero " . $n2 . " es negativo";
    }
    //-------------EJERCICIO 3----------------//
    echo "<h1> Ejercicio 3 </h1>";
    echo "<ul>";
    for ($num = 1; $num < 20; $num++) {
        if ($num % 2 != 0) {
            echo "<li>" . $num . "</li>";
        }
    }
    echo "</ul>";
    //-------------EJERCICIO 4----------------//
    echo "<h1> Ejercicio 4 </h1>";
    $dia = date("d");
    $mes = match (intval(date("n"))) {
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre",
    };
    /*$month = date("n");
    switch ($month) {
        case 1:
            $mes = "Enero";
            break;
        case 2:
            $mes = "Febrero";
            break;
        case 3:
            $mes = "Marzo";
            break;
        case 4:
            $mes = "Abril";
            break;
        case 5:
            $mes = "Mayo";
            break;
        case 6:
            $mes = "Junio";
            break;
        case 7:
            $mes = "Julio";
            break;
        case 8:
            $mes = "Agosto";
            break;
        case 9:
            $mes = "Septiembre";
            break;
        case 10:
            $mes = "Octubre";
            break;
        case 11:
            $mes = "Noviembre";
            break;
        default:
            $mes = "Diciembre";
    }*/
    echo "Hoy es dia " . $dia . " de " . $mes;
    //-------------EJERCICIO 5----------------//
    echo "<h1> Ejercicio 5 </h1>";
    echo date("e");
    //-------------EJERCICIO 6----------------//
    echo "<h1> Ejercicio 6 </h1>";
    $suma = 0;
    for ($num = 1; $num < 20; $num++) {
        if ($num % 2 == 0) {
            $suma += $num;
        }
    }
    echo "La suma de todos los numeros es $suma";

    //-------------EJERCICIO 7----------------//
    echo "<h1> Ejercicio 7 </h1>";
    echo "<p> Saca los primeros 50 numeros primos </p>";
    echo "<ul>";
    $primos = 0;

    for ($x = 2; $primos < 50; $x++) {
        $primo = true;
        for ($y = 2; $y < $x; $y++) {
            if ($x % $y == 0) {
                $primo = false;
            }
        }
        if ($primo) {
            $primos++;
            echo "<li> $x </li>";
        }
    }

    echo "</ul>";
    echo "<br>";
    $array = [2, 4, 6, 54, 3];
    for ($i = 0; $i < count($array); $i++) {
        echo $array[$i] . " ";
    }
    //-------------EJERCICIO 7----------------//
    echo "<h1> Ejercicio 8 </h1>";
    $personas = [
        '77187204D' => "Juan",
        '77553204P' => "Paco",
        '71231323S' => "Antonio",
        '21318714J' => "Rubiales",
    ];
    $datos['2313912F'] = "Logan";
    #con array_push se introducen las keys a modo indice
    echo "<ul>";
    foreach ($personas as $dni => $persona) {
        echo "<li>El cliente con D.N.I " . $dni . " se llama " . $persona . "</li>";
    }
    echo "</ul>";
    echo "<p> -----------------------------------</p><ul>";
    foreach ($personas as $persona) {
        echo "<li>El cliente  se llama " . $persona . "</li>";
    }
    echo "</ul>";
    echo "<table><caption>CLIENTES</caption>";
    echo "<tr>
    <th>DNI</th>
    <th>Nombre</th>
    <tr>";
    foreach ($personas as $dni => $persona) {
        echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
    }
    echo "</table>";
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<p> --------------TABLA SORT--------------------</p>
        <p>Ordena el array por valor de menor a mayor por valores sin mantener<p/>";
            $auxiliar = $personas;
            sort($auxiliar);
            foreach ($auxiliar as $dni => $persona) {
                echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<p> --------------TABLA RSORT--------------------</p>
        <p>Ordena el array por valor de mayor a menor manteniendo el keys<p/>";
            $auxiliar = $personas;
            rsort($auxiliar);
            foreach ($auxiliar as $dni => $persona) {
                echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<p> --------------TABLA ASORT--------------------</p>
        <p>Ordena el array por keys de menor a mayor manteniendo key<p/>";
            $auxiliar = $personas;
            asort($auxiliar);
            foreach ($auxiliar as $dni => $persona) {
                echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<p> --------------TABLA ARSORT--------------------</p>
        <p>Ordena el array de menor a mayor por keys manteniendolas<p/>";
            $auxiliar = $personas;
            arsort($auxiliar);
            foreach ($auxiliar as $dni => $persona) {
                echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<p> --------------TABLA KSORT--------------------</p>";
            $auxiliar = $personas;
            ksort($auxiliar);
            foreach ($auxiliar as $dni => $persona) {
                echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<p> --------------TABLA KRSORT--------------------</p>";
            $auxiliar = $personas;
            krsort($auxiliar);
            foreach ($auxiliar as $dni => $persona) {
                echo "<tr>
            <td> $dni </td>  
            <td>$persona </td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $juegos = [
        ["Pacman", "Atary", 60],
        ["Fortnite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Srtreet Figther", "PS4", 50],
        ["Legend of Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55],
    ];
    echo "<br>";
    ?>
    <table>
        <caption class="cap">VIDEOJUEGOS</caption>
        <thead>
            <tr>
                <th>Juego</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($juegos as $juego) {
                list($nombre, $consola, $precio) = $juego;
                echo "<tr>
                <td>$nombre</td>
                <td>$consola</td>
                <td>$precio</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <table>
        <caption class="cap">VIDEOJUEGOS</caption>
        <thead>
            <tr>
                <th>Juego</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $name = array_column($juegos, 0);
            $console = array_column($juegos, 1);
            $price = array_column($juegos, 2);
            array_multisort($console, SORT_ASC, $name, SORT_ASC, $price, SORT_ASC, $juegos);
            foreach ($juegos as $juego) {
                list($nombre, $consola, $precio) = $juego;
                echo "<tr>
                <td>$nombre</td>
                <td>$consola</td>
                <td>$precio</td>
                </tr>";
            }

            ?>
        </tbody>
    </table>
    <table>
        <caption class="cap">VIDEOJUEGOS</caption>
        <thead>
            <tr>
                <th>Juego</th>
                <th>Consola</th>
                <th>Precio</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($juegos); $i++) {
                $juegos[$i][3] = rand(1, 10);
            }
            foreach ($juegos as $juego) {
                list($nombre, $consola, $precio, $nota) = $juego;
                echo "<tr>
                <td>$nombre</td>
                <td>$consola</td>
                <td>$precio</td>
                <td>$nota</td>
                </tr>";
            }

            ?>
        </tbody>
    </table>
    <?php
    $pares = array();
    for ($i = 1; ($i <= 50); $i++)
        if ($i % 2 == 0)
            array_push($pares, $i);
    ?>
    <ul>
        <?php
        foreach ($pares as $numero) {
            echo "<li>$numero</li>";
        }
        ?>
    </ul>
    <ul>
        <?php
        arsort($pares);
        foreach ($pares as $numero) {
            echo "<li>$numero</li>";
        }
        ?>
    </ul>
    <?php
    echo "<h1> EJERCICIO 2 </H1>";
    $lista = array();
    for ($i = 0; $i < 10; $i++) {
        array_push($lista, rand(0, 100));
    }
    $auxiliar = $lista;
    arsort($lista);
    print_r($lista);
    echo "<br>";
    rsort($lista);
    print_r($lista);
    echo "<h1> Ejercicio 3 </h1><br>";
    $paises = array(
        "Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" =>
        "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" =>
        "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" =>
        "Berlin", "Greece" => "Athens", "Ireland" => "Dublin",
        "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid",
        "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia",
        "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin",
        "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" =>
        "Vienna", "Poland" => "Warsaw"
    );
    ksort($paises);
    ?>
    <table>
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capital</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($paises as $pais => $capital) {
                echo "<tr> <td> $pais </td> <td>$capital</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $series = array(
        ["Stranger things", "Netflix", 5],
        ["Spotify", "Netflix", 1],
        ["The Witcher", "HBO", 2],
        ["Ashoka", "Disney", 1],
        ["Better call Saul", "Netflix", 3]
    );
    ?>
    <br><br>
    <h1>Ejercicio 4</h1>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($series as $serie) {
                list($titulo, $plataforma, $temporadas) = $serie;
                echo "<tr>
                <td>$titulo</td>
                <td>$plataforma</td>
                <td>$temporadas</td>
                <tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            array_multisort(
                array_column($series, 2),
                SORT_ASC,
                $series
            );
            foreach ($series as $serie) {
                list($titulo, $plataforma, $temporadas) = $serie;
                echo "<tr>
                <td>$titulo</td>
                <td>$plataforma</td>
                <td>$temporadas</td>
                <tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            array_multisort(
                array_column($series, 1),
                SORT_ASC,
                array_column($series, 0),
                SORT_ASC,
                $series
            );
            foreach ($series as $serie) {
                list($titulo, $plataforma, $temporadas) = $serie;
                echo "<tr>
                <td>$titulo</td>
                <td>$plataforma</td>
                <td>$temporadas</td>
                <tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $estudiantes = array(
        ["Paco", 0],
        ["Juan", 0],
        ["Paquito", 0],
        ["Manuel", 0],
        ["Samu", 0]
    );
    foreach ($estudiantes as $estudiante) {
        $estudiante[1] = rand(0, 10);
    }
    ?>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th/th>
            </tr>
        </thead>
        <tbody>
            <?php
            array_multisort(
                array_column($estudiantes,0),SORT_ASC,
                $estudiantes
            );
            /*
            foreach ($estudiantes as $estudiante) {
                list($nombre, $nota) = $estudiante;
                $nota = rand(0, 10);
                echo "<tr>
                <td>$nombre</td>
                <td>$nota</td>";
                switch ($nota) {
                    case 0:
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                        echo "<td>Insuficiente</td>";
                        break;
                    case 5:
                        echo "<td>Suficiente</td>";
                        break;
                    case 6:
                        echo "<td>Bien</td>";
                        break;
                    case 7:
                    case 8:
                        echo "<td>Notable</td>";
                        break;
                    case 9:
                        echo "<td>Sobresaliente</td>";
                        break;
                    case 10:
                        echo "<td>Matricula</td>";
                        break;
                        default: echo "<td>ERROR<td>";
                }
                echo "</tr>";
            }*/
            function asignarNota(int $nota){
                return match(true){
                    $nota<5=> "suspenso",
                    $nota==5=> "suficiente",
                    $nota<7=> "bien",
                    $nota<9=> "notable",
                    $nota==10=> "sobresaliente"
                };
            }
            foreach($estudiantes as $individuo){
                list($nombre, $nota)=$individuo;
                $nota = rand(0, 10);
                echo "<tr>
                <td>$nombre</td>
                <td>$nota</td>
                <td>". asignarNota($nota). "</td>";
                
            }
            ?>
        </tbody>
    </table>
</body>

</html>