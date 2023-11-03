<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'conexiones.php' ?>
</head>

<body>
    <?php
    session_start();
    $_usuario=$_SESSION["usuario"];
    ?>
    <div class="container">
        <h1>Pagina Principal</h1>
        <h2>Bienvenide <?php echo $_usuario?></h2>
    </div>
    
</body>

</html>