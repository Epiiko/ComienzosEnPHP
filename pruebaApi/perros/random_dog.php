<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random dog</title>
</head>
<body>
    <?php
    $apiUrl = "https://dog.ceo/api/breeds/image/random";

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
</body>
</html>
