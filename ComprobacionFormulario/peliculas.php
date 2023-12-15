<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php require '../Funciones/base_de_datos.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    function depurar($entrada)
    {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id = depurar($_POST["id_pelicula"]);
        $temp_titulo = depurar($_POST["titulo"]);
        $temp_edad_recomendada = depurar($_POST["edad_recomendada"]);
        $temp_fecha_estreno = depurar($_POST["fecha_estreno"]);
        $nombre_imagen=$_FILES["imagen"]["name"];
        $tipo_imagen=$_FILES["imagen"]["type"];
        $tamano_imagen=$_FILES["imagen"]["size"];
        $ruta_temp=$_FILES["imagen"]["tmp_name"];
        $ruta_final = "img/".$nombre_imagen;
        echo $nombre_imagen. " " . $tipo_imagen . " " . $tamano_imagen. " ". $ruta_temp;
        move_uploaded_file($ruta_temp, $ruta_final);
        

        #   Validación titulo
        if (!strlen($temp_titulo) > 0) {
            $err_titulo = "El nombre de la pelicula es obligatorio";
        } else {
            $patron = "/^[a-zA-Z0-9 ]{1,80}$/";
            if (!preg_match($patron, $temp_titulo)) {
                $err_titulo = "El titulo debe tener maximo 80 caracteres";
            } else {
                $titulo = $temp_titulo;
            }
        }

        #   Validación id
        if (strlen($temp_id) == 0) {
            $err_id = "El id es obligatorio";
        } else {
            // if (!is_numeric($temp_id)) {
            //     $err_id = "El id es numerico";
            // } else {
            //     $id_pelicula = $temp_id;
            // }
            if(filter_var($temp_id, FILTER_VALIDATE_INT)===false){
                $err_id="El id debe de ser numerico";
            }else{
                if(strlen($temp_id)>8){
                    $err_id="El numero no puede tener mas de 8 digitos";
                }else{
                    $temp_id =(int) $temp_id;
                    $id_pelicula=$temp_id;
                }
            }
        }

        #   Edad recomendada (realmente se haria bien hecho con un select)
        if (strlen($temp_edad_recomendada) == 0) {
            $err_edad = "El PEGI es obligatorio";
        } else {
            match (true) {
                $temp_edad_recomendada == 0 => $edad_recomendada = $temp_edad_recomendada,
                $temp_edad_recomendada == 3 => $edad_recomendada = $temp_edad_recomendada,
                $temp_edad_recomendada == 7 => $edad_recomendada = $temp_edad_recomendada,
                $temp_edad_recomendada == 12 => $edad_recomendada = $temp_edad_recomendada,
                $temp_edad_recomendada == 16 => $edad_recomendada = $temp_edad_recomendada,
                $temp_edad_recomendada == 18 => $edad_recomendada = $temp_edad_recomendada,
                default => $err_edad = "El PEGI puede ser [0,3,7,12,16,18]"
            };
        }

        #   Validación fecha de nacimiento
        if (strlen($temp_fecha_estreno) == 0) {
            $err_fecha_estreno = "La fecha de nacimiento es obligatoria";
        } else {
            list($anyo, $mes, $dia) = explode('-', $temp_fecha_estreno);
            if ($anyo < 1945) {
                $err_fecha_estreno = "No puede ser anterior a la primera pelicula";
            } else {
                $fecha_estreno = $temp_fecha_estreno;
            }
        }
    }
    ?>
    <div class="container">
        <h1>Insertar pelicula</h1>
        <div class="col-3">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- <fieldset> -->
                <div class="mb-3">
                    <label class="form-label">Id pelicula: </label>
                    <input class="form-control" type="text" name="id_pelicula">
                    <?php if (isset($err_id)) echo $err_id ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Titulo: </label>
                    <input class="form-control" type="text" name="titulo">
                    <?php if (isset($err_titulo)) echo $err_titulo ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de estreno: </label>
                    <input class="form-control" type="date" name="fecha_estreno">
                    <?php if (isset($err_fecha_estreno)) echo $err_fecha_estreno ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">PEGI: </label>
                    <input class="form-control" type="text" name="edad_recomendada">
                    <?php if (isset($err_edad)) echo $err_edad ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
                <input class="btn btn-primary" type="submit" value="Registrarse">
                <!-- </fieldset> -->
            </form>
        </div>
        <?php
        if (isset($id_pelicula) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada) && isset($ruta_final)) {

            echo "<h3>ID: $id_pelicula</h3>";
            echo "<h3>Titulo: $titulo</h3>";
            echo "<h3>Fecha de estreno: $fecha_estreno</h3>";
            echo "<h3>PEGI: $edad_recomendada</h3>";
            $sql = "INSERT INTO peliculas (id_pelicula, titulo, fecha_estreno, edad_recomendada, imagen)
        VALUES ('$id_pelicula', '$titulo', '$fecha_estreno', '$edad_recomendada' , '$ruta_final')";
            $conexion_peliculas->query($sql);
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>

</html>