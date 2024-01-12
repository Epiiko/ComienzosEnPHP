<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View videogame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
</head>

<body>

    <?php
    if (!isset($_GET["titulo_comic"])) header('location: index.php');
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $titulo_comic = $_GET["titulo_comic"];
        $sql = $_conexion->prepare("SELECT * FROM comics
            WHERE titulo_comic = ?");
        $sql->bind_param("s", $titulo_comic);
        $sql->execute();
        $resultado = $sql->get_result();
        $fila = $resultado->fetch_assoc();
        $paginas = $fila["paginas"];
        $genero = $fila["genero"];
        $id_comic=$fila["id_comic"];
        $_conexion->close();
    }
    ?>
    <div class="container my-4">
    <a href="index.php">
            <input type="button" value="Volver a inicio">
        </a>
        <h1>View Comic</h1>
        <h3>Id: <?php echo $id_comic?></h3>
        <h3>Titulo: <?php echo $titulo_comic ?></h3>
        <h3>Páginas: <?php echo $paginas ?> páginas</h3>
        <h3>Genero: <?php echo $genero ?></h3>
        <form action="edit_comic.php" method="get">
            <input type="hidden" name="titulo_comic" value="<?php echo $titulo_comic ?>">
            <input type="hidden" name="genero" value="<?php echo $genero ?>">
            <input type="hidden" name="paginas" value="<?php echo $paginas ?>">
            <input type="hidden" name="id" value="<?php echo $id_comic ?>">
            <input class="btn btn-primary" type="submit" value="Editar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>