<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>eoooo</h1>
    <?php
         $apiUrl = "http://localhost:8000/api/films";
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $apiUrl);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($curl);
         curl_close($curl);       
         $peliculas = json_decode($response, TRUE); 
         $peliculas=$peliculas["data"];
         ?>
    <h1>Peliculas</h1> 
    <ul>
    <?php foreach ($peliculas as $pelicula) {
        ?><li><h1>Titulo: <?php echo $pelicula['title'] ?></h1></li>
        <li>Duration: <?php echo $pelicula['duration'] ?></li>
         <li>Edad: <?php echo $pelicula['age_rating'] ?></li>
         <a href="show_film.php?id=<?php echo $pelicula["film_id"]?>">Ver detalles</a>
         <?php

         }?>        
    </ul>
</body>
</html>