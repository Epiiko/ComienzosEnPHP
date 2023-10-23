<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php require '../Funciones/base_de_datos.php'  ;?>
</head>
<body>
    <?php
    function depurar($entrada) {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id = depurar($_POST["id_pelicula"]);
        $temp_titulo = depurar($_POST["titulo"]);
        $temp_edad_recomendada = depurar($_POST["edad_recomendada"]);
        $temp_fecha_estreno = depurar($_POST["fecha_estreno"]);
 
        #   Validación titulo
        if(!strlen($temp_titulo) > 0) {
            $err_titulo = "El nombre de la pelicula es obligatorio";
        } else {
            $patron = "/^[a-zA-Z0-9]{1,80}$/";
            if(!preg_match($patron, $temp_titulo)) {
                $err_titulo = "El titulo debe tener maximo 80 caracteres";
            } else {
                $titulo = $temp_titulo;
            }
        }

        #   Validación id
        if(strlen($temp_id) == 0) {
            $err_id = "El id es obligatorio";
        } else {
            if(!is_numeric($temp_id)){
                $err_id = "El id es numerico";
            }else{
                $id_pelicula=$temp_id;
            }
        }

        #   Edad recomendada
        if(strlen($temp_edad_recomendada) == 0) {
            $err_edad = "El PEGI es obligatorio";
        } else {
            match(true){
                $temp_edad_recomendada==0 => $edad_recomendada=$temp_edad_recomendada, 
                $temp_edad_recomendada==3 => $edad_recomendada=$temp_edad_recomendada,
                $temp_edad_recomendada==7 => $edad_recomendada=$temp_edad_recomendada,
                $temp_edad_recomendada==12 => $edad_recomendada=$temp_edad_recomendada,
                $temp_edad_recomendada==16 => $edad_recomendada=$temp_edad_recomendada,
                $temp_edad_recomendada==18 => $edad_recomendada=$temp_edad_recomendada,
                default => $err_edad="El PEGI puede ser [0,3,7,12,16,18]"
            };
        }

        #   Validación fecha de nacimiento
        if(strlen($temp_fecha_estreno) == 0) {
            $err_fecha_estreno = "La fecha de nacimiento es obligatoria";
        } else {
            list($anyo, $mes, $dia) = explode('-', $temp_fecha_estreno);
            if ($anyo<1945){
                $err_fecha_estreno ="No puede ser anterior a la primera pelicula";
            }else{
                $fecha_estreno=$temp_fecha_estreno;
            }
        }
    }
    ?>

    <form action="" method="post">
        <fieldset>
            <label>Id pelicula: </label>
            <input type="text" name="id_pelicula">
            <?php if(isset($err_id)) echo $err_id ?>
            <br><br>
            <label>Titulo: </label>
            <input type="text" name="titulo">
            <?php if(isset($err_titulo)) echo $err_titulo ?>
            <br><br>
            <label>Fecha de estreno: </label>
            <input type="date" name="fecha_estreno">
            <?php if(isset($err_fecha_estreno)) echo $err_fecha_estreno ?>
            <br><br>
            <label>PEGI: </label>
            <input type="text" name="edad_recomendada">
            <?php if(isset($err_edad)) echo $err_edad ?>
            <br><br>
            <input type="submit" value="Registrarse">
        </fieldset>
    </form>
    <?php
    if(isset($id_pelicula) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada)) {

        echo "<h3>ID: $id_pelicula</h3>";
        echo "<h3>Titulo: $titulo</h3>";
        echo "<h3>Fecha de estreno: $fecha_estreno</h3>";
        echo "<h3>PEGI: $edad_recomendada</h3>";
        $sql="INSERT INTO peliculas (id_pelicula, titulo, fecha_estreno, edad_recomendada)
        VALUES ('$id_pelicula', '$titulo', '$fecha_estreno', '$edad_recomendada')";
        $conexion_peliculas -> query($sql);
    }
    ?>
</body>
</html>