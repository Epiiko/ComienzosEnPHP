<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require "clasePelicula.php";
    ?>
    <style>
        tr{
            --bs-table-hover-color: #f00;
        }
    </style>
</head>

<body>
    <?php
    $peliculas = [];
    $pelicula1 = new Pelicula(1, "Spiderman", "2020-01-01", "7");
    $pelicula2 = new Pelicula(2, "Kung-Fu Panda", "2017-03-05", "0");
    $pelicula3 = new Pelicula(3, "Batman", "2010-12-12", "18");
    array_push($peliculas, $pelicula1);
    array_push($peliculas, $pelicula2);
    array_push($peliculas, $pelicula3);
    ?>
    <div class="container">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Id #</th>
                <th>Nombre</th>
                <th>Estreno</th>
                <th>PEGI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($peliculas as $pelicula) {
                echo "<tr>";
                echo "<td>" . $pelicula-> id_pelicula . "</td>
                <td>" . $pelicula-> titulo . "</td>
                <td>" . $pelicula->fecha_estreno . "</td>
                <td>" . $pelicula->edad_recomendada . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</body>

</html>