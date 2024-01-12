<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require 'database_conection.php' ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "SELECT * FROM comics";
        $stmt = $_conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (($_POST["genero"]!="noseleccionado") && (!isset($_POST["max"])) && (!isset($_POST["min"]))) {
            $genero = $_POST["genero"];
            $sql = "SELECT * FROM comics WHERE genero = ?";
            $stmt = $_conexion->prepare($sql);
            $stmt->bind_param("s", $titulo);
            $stmt->execute();
            $resultado = $stmt->get_result();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["max"]) && isset($_POST["min"]) &&  ($_POST["genero"]=="noseleccionado")) {
            $max = $_POST["max"];
            $min = $_POST["min"];
            $sql = "SELECT * FROM comics WHERE paginas BETWEEN ? and ?";
            $stmt = $_conexion->prepare($sql);
            $stmt->bind_param("ii", $max, $min);
            $stmt->execute();
            $resultado = $stmt->get_result();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["max"]) && isset($_POST["min"])&& ($_POST["genero"]!="noseleccionado")) {
            $max = $_POST["max"];
            $min = $_POST["min"];
            $genero= $_POST["genero"];
            $sql = "SELECT * FROM comics WHERE genero= ? and paginas BETWEEN ? and ?";
            $stmt = $_conexion->prepare($sql);
            $stmt->bind_param("sii", $genero, $max, $min);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $_conexion->close();
        }
    }
    ?>
    <div class="container">
        <h1 style="text-align: center">Tienda Alesa Comics</h1>
        <a href="create_comic.php">
            <input type="button" value="Añadir comic">
        </a>
        <form action="" method="POST">
            <div>
                <div class="row my-4">
                    <div class="mb-3">
                        <label class="form-label">Genero</label>
                        <select name="genero" id="">
                            <option  selected value="noseleccionado">Sin filtro</option>
                            <option value="Accion">Accion</option>
                            <option value="Aventuras">Aventuras</option>
                            <option value="Romance">Romance</option>
                            <option value="Comedia">Comedia</option>
                        </select>
                    </div>
                </div>
                <div class="container my-4">
                    <label for="max">De </label>
                    <input type="number" step="1" name="max">
                    <label for="min">a </label>
                    <input type="number" step="1" name="min">
                    <label for="de"> paginas </label>
                    <br><br>
                    <input type="submit" value="Filtrar" class="btn btn-success">
                    <input type="hidden" name="filtroprecio" value="filtroprecio">
                </div>
            </div>
        </form>

        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Paginas</th>
                    <th>Genero</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='col-4'>" . $fila["id_comic"] . "</td>";
                    echo "<td class='col-3'>" . $fila["titulo_comic"] . "</td>";
                    echo "<td class='col-3'>" . $fila["paginas"] . "  pag. </td>";
                    echo "<td class='col-3'>" . $fila["genero"] . " </td>";
                ?>
                    <td>
                        <div style="display: flex;">
                            <form action="view_comic.php" method="get">
                                <input type="submit" class="btn btn-info" value="Ver">
                                <input type="hidden" name="titulo_comic" value="<?php echo $fila["titulo_comic"] ?>">
                            </form>
                            <form action="delete_comic.php" method="post">
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                                <input type="hidden" name="id_comic" value="<?php echo $fila["id_comic"] ?>">
                            </form>
                        </div>
                    </td>

                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>