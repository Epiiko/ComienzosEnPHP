<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form2</title>
</head>

<body>
    <fieldset>
        <legend>Formulario</legend>
        <form action="" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre">
            <br><br>
            <label for="apellido">Apellido: </label>
            <input type="text" name="apellido">
            <br><br>
            <label for="edad">Edad</label>
            <input type="date" name="edad">
            <br><br>
            <input type="submit" value="Enviar">
        </form>
    </fieldset>
    <?php
    if (($_SERVER["REQUEST_METHOD"]) == "POST") {
        $temp_nombre = $_POST["nombre"];
        $temp_apellido = $_POST["apellido"];
        $temp_fecha = $_POST["edad"];
        if (!strlen($temp_nombre) > 0) {
            $name_err = "El nombre debe de estar completo";
        } else {
            $patron = "/^[a-zA-Z][a-zA-Z ]*[a-zA-Z]$/";
            if (!preg_match($patron, $temp_nombre)) {
                $name_err = "El nombre debe empezar por letra terminar por letra y solo acepta letras y espacios";
            } else {
                if (!strlen($temp_nombre) < 30) {
                    $name_err = "El nombre no puede tener mas de 30 caracteres";
                } else {
                    $nombre = $temp_nombre;
                    $nombre = ucfirst($nombre);
                    echo $nombre;
                }
            }
        }
        if (!strlen($temp_appellido) > 0) {
            $surname_err = "El appellido debe de estar completo";
        } else {
            $patron = "/^[a-zA-Z][a-zA-Z ]*[a-zA-Z]$/";
            if (!preg_match($patron, $temp_appellido)) {
                $surname_err = "El appellido debe empezar por letra terminar por letra y solo acepta letras y espacios";
            } else {
                if (!strlen($temp_appellido) < 30) {
                    $surname_err = "El appellido no puede tener mas de 30 caracteres";
                } else {
                    $apellido = $temp_appellido;
                    $apellido = (ucfirst($apellido));
                    echo $apellido;
                }
            }
        }
        if (!strlen($temp_fecha) > 0) {
            $err_fech = "La fecha de nacimiento es obligatoria";
        } else {
            $fechahoy = date("y", "m", "d");
            list($año, $mes, $dia) = explode('-', $fechahoy);
            list($año2, $mes2, $dia2) = explode('-', $temp_fecha);
                if ($año - $año2 == 18) {
                    if ($mes - $mes2 == 0) {
                        if ($dia - $dia2 < 0) {
                            $err_fech = "Menor de edad";
                        } else {
                            $fecha = $temp_fecha;
                            echo $fecha;
                        }
                    } else if ($mes - $mes2 < 0) {
                        $err_fech = "Menor de edad";
                    } else {
                        $fecha = $temp_fecha;
                        echo $fecha;
                    }
                } elseif ($año - $año2 < 18) {
                    $err_fech = "Menor de edad";
                } else {
                    $fecha = $temp_fecha;
                    echo $fecha;
                }
            }
        }
    ?>
</body>

</html>