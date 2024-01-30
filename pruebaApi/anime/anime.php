<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $apiUrl = "https://api.jikan.moe/v4/random/anime";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);       
        $anime = json_decode($response, TRUE); 
        ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $anime["data"]["images"]["jpg"]["image_url"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $anime["data"]["titles"][0]["title"] ?></h5>
                <a href="show_anime.php?id=<?php echo $anime["data"]["mal_id"] ?>"><input type="button" value="Ver detalles"></a>
            </div>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>