<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // echo "<h1>Hola mundo /n</h1>";
    /*$ = variables
        para numeros con exponentes 5e3=5000.
    */
    #Comentario
    $n1 = 10;
    $n2 = 4;
    //echo $n1 * $n2;
    //var_dump muestra el tipo de la variable y su contenido.
    //---------------CONCATENACION-------------------//
    $l1 = "Tablas de ";
    $l2 = "Multiplicar";
    $l3 = $l1 . $l2; //concatenacion
    echo "<h1>$l3</h1>";
    //---------------Bucle en tabla-----------------//
    echo "<table style='text-align:center'>";
    for ($i = 1; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 1; $j < 10; $j++) {

            echo "<td style= 'border : 1px solid'> $i x $j = " . $i * $j . "  </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<br> <br>";
    $string1 = "Hola"; //podemos introducir variables
    $string2 = 'Hola';
    echo "Texto: $string1";
    //---------------Arrays-----------------//
    echo "<br><h1> Arrays </h1><br>";
    $array  = [1, 2, 3, 4];
    $array2 = ["a", "b", "c"];
    echo '$array  = [1,2,3,4]';
    var_dump($array);
    echo "<br><br>";
    echo '$array2 = [a, b , c]';
    var_dump($array2);
    echo "<br><h1> Booleanos </h1>";
    $b = true;
    var_dump($b);
    //---------------CONSTANTES--------------//
    echo "<br><h1> Constantes </h1>";
    define("EDAD", 25);
    echo EDAD;
    //--------------Condicionales------------------//
    echo "<br><h1> Condicionales </h1>";
    $dia = date("d");
    if ($dia < 15) {
        echo "Estamos a principio de mes";
    } else {
        echo "Estamos al final de mes";
    }
    echo "<br><br>";
    $hora = date("H");
    if ($hora < "12") {
        echo " Buenos dias";
    } else if ($hora < "20") {
        echo "Buenas tardes";
    } else {
        echo "Buenas noches";
    }
    echo "<br><br>";
    $ran = rand(1, 150);
    if ($ran < 10) {
        echo "El numero $ran tiene un digito";
    } else if ($ran < 100) {
        echo "El numero $ran tiene dos digitos";
    } else {
        echo "El numero $ran tiene tres digitos";
    }
    echo "<br><h2> Switch </h2>";
    $n = rand(1, 3);
    switch ($n) {
        case 1:
            echo "El numero entro en el caso " . $n;
            break;
        case 2:
            echo "El numero entro en el caso " . $n;
            break;
        default:
            echo "El numero entro en el caso " . $n;
            break;
    }
    echo "<br><br>";
    $diaclass = date("l");
    switch ($diaclass) {
        case "Monday":
            $diaesp = "Lunes";
            break;
        case "Tuesday":
            $diaesp = "Martes";
            break;
        case "Wednesday":
            $diaesp = "Miercoles";
            break;
        case "Thursday":
            $diaesp = "Miercoles";
            break;
        case "Thursday":
            $diaesp = "Jueves";
            break;
        case "Friday":
            $diaesp = "Viernes";
            break;
        case "Saturday":
            $diaesp = "Sabado";
            break;
        default:
            $diaesp = "Domingo";
    }
    switch ($diaclass) {
        case "Lunes":
        case "Miercoles":
        case "Viernes":
            echo "Hoy $diaesp si hay clase";
            break;
        default:
            echo "Hoy $diaesp no hay clases";
    }
      //--------------ESTRUCTURA MATCH------------------//
      echo "<br><h2> Match </h2>";
      $d= date("l");
      $de = match ($d){
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sabado",
        "Sunday" => "Domingo",
      };
      echo $de;
       //--------------Bucles------------------//
       echo "<br><h2> Bucles </h2>";
       $i = 1;
       while ($i <=10){
        echo $i. " ";
        $i++;
        
       }
       echo "<br>";
       for ($p=10;$p>0;$p--){
        echo $p. " ";
       }
       echo "<br>";
       for ($j= 0; $j<=50;$j++){
        if($j%3==0 || $j%2==0){
            if($j%6!=0){
                echo $j . " ";
            }
        }
       }
         //--------------Arrays------------------//
         #existen varias formas de inicializar los arrays
         #ya que estos son realmente colecciones clave-valor.
         echo "<br><h2> Arrays </h2>";
         $array2= [2,3,4,5,6];
         print_r($array2);
         echo "<br>";
         $array3=[
            'key1' => 2,
            'key2' => 3,
            'key3' => 4,
            'key5' => 5
         ];
         print_r($array3);
         echo "<br>";
         foreach ($array3 as $numerin) {
            print($numerin. " ");         
         }
    ?>

</body>

</html>