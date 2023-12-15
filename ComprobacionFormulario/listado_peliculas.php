<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../Funciones/base_de_datos.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mb-10">Listado de películas</h1>

        <div class="col-9">
            <table class="table table-striped table-hover">
                <thead class="table table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Fecha estreno</th>
                        <th>PEGI</th>
                        <th>Portada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM peliculas";
                    $res = $conexion_peliculas->query($sql);
                    while ($fila = $res->fetch_assoc()) { //Va fetcheando las filas de la tabla, almacenamos en filas
                    echo "<tr>
                    <td>" . $fila["id_pelicula"] . "</td>
                    <td>" . $fila["titulo"] . "</td>
                    <td>" . $fila["fecha_estreno"] . "</td>
                    <td>" . $fila["edad_recomendada"] . "</td>"
                    ?>
                    <td>
                        <img src="<?php echo $fila["imagen"]  ?>" alt="<?php echo $fila["titulo"]?>" height="50" width="100">
                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>