<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Creamos las variables
        $titulo_comic = $_POST["titulo_comic"];
        $paginas = $_POST["paginas"];
        $genero = $_POST["genero"];
        $sql = $_conexion->prepare("INSERT INTO comics (titulo_comic, paginas, genero) values (?, ?, ?);");
        $sql->bind_param("sis", $titulo_comic, $paginas, $genero);
        $sql->execute();
        //Esto lo hace a la larga php, pero es recomendable hacerlo
        $_conexion->close();
        header('Location: index.php');
    }
    ?>
    <div class="container">
        <h1>Nuevo comic</h1>
        <a href="index.php">
            <input type="button" value="Volver a inicio">
        </a>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo_comic">
            </div>
            <div class="mb-3">
                <label class="form-label">Paginas</label>
                <input class="form-control" type="number" step="1" name="paginas">
            </div>
            <div class="mb-3">
                <label class="form-label">Genero</label>
                <select name="genero" id="">
                    <option value="Accion">Acción</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedia">Comedia</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="crear">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>