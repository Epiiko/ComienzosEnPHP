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
    if($_SERVER["REQUEST_METHOD"]=="GET"){
    $sql = "SELECT * FROM videojuegos";
    $stmt = $_conexion->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $_conexion -> close();
    }
    ?>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $titulo=$_POST["buscador"];
        $filtro=$_POST["filtro"];
        $orden=$_POST["orden"];
        $sql = "SELECT * FROM videojuegos WHERE titulo LIKE concat('%', ? , '%') ORDER BY $filtro $orden" ;
        $stmt = $_conexion->prepare($sql);
        $stmt->bind_param("s" , $titulo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $_conexion -> close();
    }
    ?>
    <div class="container">
        <h1>VIDEOJUEGOS</h1>
        <form action="" method="POST">
            <div class="row my-4">
                <div class="col-4">
                    <input type="text" name="buscador" default="Buscador">
                </div>
                <div class="col-2">
                <select name="filtro" id="">
                    <option value="titulo">Titulo</option>
                    <option value="distibuidora">Distribuidora</option>
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
                </div>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Distribuidora</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = $resultado -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$fila["titulo"]."</td>";
                    echo "<td>".$fila["distribuidora"]."</td>";
                    echo "<td>".$fila["precio"]."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>