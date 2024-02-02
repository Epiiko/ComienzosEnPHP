<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id_film=$_GET["id"];
        $apiUrl = "http://localhost:8000/api/films/$id_film";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);       
        $pelicula = json_decode($response, TRUE); 
        print_r($pelicula);
        // $pelicula=$pelicula["data"];
    ?>
    <h1><?php echo $pelicula["title"]
    ?></h1>
</body>
</html>