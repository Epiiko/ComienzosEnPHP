<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        //var_dump($response);   
        $anime = json_decode($response, TRUE); 
        $anime=$anime["data"];
    }
    ?>
    <h1><?php echo $anime["titles"][0]["title"] ?></h1>
    <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="Foto de <?php echo $anime["titles"][0]["title"] ?>">
    <p><?php echo $anime["synopsis"] ?></p>
    <p><?php echo $anime["rating"] ?></p>
    
</body>
</html>