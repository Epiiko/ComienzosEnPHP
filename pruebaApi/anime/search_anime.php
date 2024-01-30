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
        $apiUrl = "https://api.jikan.moe/v4/genres/anime";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $generos = json_decode($response, TRUE);
        $generos = $generos["data"];
        session_start();
        $_SESSION["generos"]=$generos;
    }
    ?>
    <form action="" method="POST">
        Titulo: <input type="text" name="titulo">
        <br><br><br>
        Limite: <select name="limite" id="">
            <option value="" selected>Seleccione Numero</option>
            <?php
            for ($i = 1; $i <= 5; $i++) {
            ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php
            }
            ?>
        </select>
        <br><br><br>

        Genero: <select name="genero" id="">
            <option value="" selected>Seleccione Genero</option>
            <?php
           
            foreach ($generos as $genero) {
                
            ?>
                <option value="<?php echo $genero["mal_id"] ?>"><?php echo $genero["name"] ?></option>
            <?php
            }
            ?>
        </select>
        <br><br><br>
        <input type="submit" value="Buscar">
    </form>
    <br><br><br><?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //conseguimos de nuevo los generos 
                    session_start();
                    $generos=$_SESSION["generos"];
                    $titulo = $_POST["titulo"];
                    $genero_nuevo = $_POST["genero"];
                    $limite = $_POST["limite"];
                    if (!isset($titulo)) $titulo = "";
                    $apiUrl = "https://api.jikan.moe/v4/anime?&q=$titulo&genres=$genero_nuevo&limit=$limite";
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $apiUrl);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $animes = json_decode($response, TRUE);
                    $animes = $animes["data"];
                ?>
        <div class="container my-4 f">
            <?php
                    foreach ($animes as $anime) {
            ?>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $anime["titles"][0]["title"] ?></h5>
                        <a href="show_anime.php?id=<?php echo $anime["mal_id"] ?>"><input type="button" value="Ver detalles"></a>
                    </div>
                </div>
                <br><br>
            <?php
                    }
            ?>
        </div>
    <?php
                }
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>