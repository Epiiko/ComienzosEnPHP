<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search dog</title>
</head>
<body>
    <form action="" method="post">
    <h2>Elige raza</h2>
    <select name="perros">
    <?php 
       $apiUrl = "https://dog.ceo/api/breeds/list/all";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);
        $dogs = $array['message'];
        foreach($dogs as  $nombreClave => $dog) { 
            if (count($dog) > 0) {
                for ($i = 0; $i < count($dog); $i++ ) {
                    $nombreTotal = $dog[$i] . " " . $nombreClave;
                    $nombreTotalValue =  $nombreClave . "/" . $dog[$i];
                    ?> <option value="<?php echo $nombreTotalValue ?>"><?php echo $nombreTotal?></option> <?php
                }
            } else {
                ?> <option value="<?php echo $nombreClave ?>"><?php echo $nombreClave?></option> <?php
            }
        }

    ?>  
    </select>
    <br><br>
    <input type="submit" value="Buscar">
    </form>
    <?php

   
    // Verifica si el formulario ha sido enviado usando el método POST
    if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Raza del perro que me piden en el select 
    $razaPerro = $_POST["perros"];

    $apiUrl = "https://dog.ceo/api/breed/$razaPerro/images/random";

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($curl);

    $array = json_decode($respuesta, true);

    
    $dog = $array;


    $imagen = $dog['message'];
    ?>

    <h1><?php echo "Soy el dogo" ?></h1>
    <img src="<?php echo $imagen?>" alt="">
    <?php
    }
    ?>
</body>
</html>
