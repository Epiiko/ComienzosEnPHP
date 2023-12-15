<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require "../Objetos/clasePelicula.php";
    ?>
    <?php require "../Funciones/base_de_datos.php";
    ?>
    <style>
        tr {
            --bs-table-hover-color: #f00;
        }
    </style>
</head>

<body>
    <?php if($_SERVER["REQUEST_METHOD"]=='POST'){
        $id_pelicula =$_POST["id_pelicula"];
        echo "<p>La pelicula selecionada es $id_pelicula</p>";
    }

    $sql = "SELECT * FROM peliculas";
    $res = $conexion_peliculas->query($sql);
    $peliculas = [];
    while ($fila = $res->fetch_assoc()) {
        $nueva_pelicula = new Pelicula(
            $fila["id_pelicula"],
            $fila["titulo"],
            $fila["fecha_estreno"],
            $fila["edad_recomendada"],
        );
        array_push($peliculas, $nueva_pelicula);
    }

    ?>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id #</th>
                    <th>Nombre</th>
                    <th>Estreno</th>
                    <th>PEGI</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($peliculas as $pelicula) { ?>
                    <tr>
                        <td> <?php echo  $pelicula->id_pelicula ?></td>
                        <td> <?php echo $pelicula->titulo ?> </td>
                        <td><?php echo $pelicula->fecha_estreno  ?> </td>
                        <td><?php echo $pelicula->edad_recomendada ?></td>;
                        <td>
                            <form action="" method="post">
                            <input type="hidden" name="id_pelicula" value="<?php echo $pelicula -> id_pelicula?>">
                                <input type="submit" class="btn btn-warning" value="Añadir">
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>