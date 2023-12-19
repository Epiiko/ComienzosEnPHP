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
        $sql = "SELECT * FROM videojuegos";
        $stmt = $_conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["buscar"])) {
            $titulo = $_POST["buscador"];
            $filtro = $_POST["filtro"];
            $orden = $_POST["orden"];
            $sql = "SELECT * FROM videojuegos WHERE titulo LIKE concat('%', ? , '%') ORDER BY $filtro $orden";
            $stmt = $_conexion->prepare($sql);
            $stmt->bind_param("s", $titulo);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $_conexion->close();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["filtroprecio"])) {
            $max = $_POST["max"];
            $min = $_POST["min"];
            $sql = "SELECT * FROM videojuegos WHERE precio BETWEEN ? and ?";
            $stmt = $_conexion->prepare($sql);
            $stmt->bind_param("dd", $max, $min);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $_conexion->close();
        }
    }
    ?>
    <div class="container">
        <h1>VIDEOJUEGOS</h1>
        <a href="create_videogame.php">
            <h3>Añadir juego</h3>
        </a>
        <form action="" method="POST">
            <div class="row my-4">
                <div class="col-4">
                    <input type="text" name="buscador" default="Buscador">
                </div>
                <div class="col-2">
                    <select name="filtro" id="">
                        <option value="titulo">Titulo</option>
                        <option value="distribuidora">Distribuidora</option>
                        <option value="precio">Precio</option>
                    </select>
                </div>
                <div class="col-2">
                    <select name="orden" id="">
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                    <input type="hidden" name="buscar" value="buscar">
                </div>
            </div>
        </form>

        <form action="" method="post">
            <div class="container my-4">
                <label for="max">De </label>
                <input type="number" step="1" name="max">
                <label for="min">a </label>
                <input type="number" step="1" name="min">
                <label for="de"> € </label>
                <input type="submit" value="Filtrar" class="btn btn-success">
                <input type="hidden" name="filtroprecio" value="filtroprecio">
            </div>
        </form>

        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>Título</th>
                    <th>Distribuidora</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='col-4'>" . $fila["titulo"] . "</td>";
                    echo "<td class='col-3'>" . $fila["distribuidora"] . "</td>";
                    echo "<td class='col-3'>" . $fila["precio"] . " €</td>";
                ?>
                    <td>
                        <div style="display: flex;">
                            <form action="view_videogame.php" method="get">
                                <input type="submit" class="btn btn-info" value="Ver">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
                            </form>
                            <form action="edit_videogame.php" method="get">
                                <input type="submit" class="btn btn-primary" value="Editar">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
                            </form>
                            <form action="delete_videogame.php" method="post">
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
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