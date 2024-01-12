<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar videogame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php'; ?>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $genero_old =$_GET["genero"];
        $titulo_original = $_GET["titulo_comic"];
        $paginas_original=$_GET["paginas"];
        $sql = $_conexion->prepare("SELECT * FROM comics
            WHERE titulo_comic = ?");
        $sql->bind_param("s", $titulo_original);
        $sql->execute();
        $resultado = $sql->get_result();
        $fila = $resultado->fetch_assoc();
        $id= $fila["id_comic"];
        $paginas = $fila["paginas"];
        $genero = $fila["genero"];
        $_conexion->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo_comic = $_POST["titulo_comic"];
        $paginas = $_POST["paginas"];
        $genero = $_POST["genero"];
        $id = $_POST["id"];
        $sql = $_conexion->prepare("UPDATE comics 
            SET titulo_comic = ? , paginas = ? , genero = ?
            WHERE id_comic = ?");
        $sql->bind_param("sisi", $titulo_comic, $paginas, $genero, $id);
        $sql->execute();
        header('location: index.php');
    }
    ?>

    <div class="container">
        <h1>Editar comic</h1>
        <a href="index.php">
            <input type="button" value="Volver a inicio">
        </a>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo_comic" value="<?php echo $titulo_original ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Paginas</label>
                <input class="form-control" type="number" step="1" name="paginas" value="<?php echo $paginas_original ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Genero</label>
                <select name="genero" id="">
                    <option hidden selected value="<?php echo $genero ?>"><?php echo $genero ?></option>
                    <option value="Accion">Accion</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedia">Comedia</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar datos">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>