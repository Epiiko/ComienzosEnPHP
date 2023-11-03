<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'conexiones.php' ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $res = $conexion_usuarios->query($sql);
        if ($res->num_rows === 0) {
            ?>
            <div class="alert alert-danger">No existe el usuario</div>
            <?php
        } else {

            while ($fila = $res->fetch_assoc()) {
                $pasword_cifrada = $fila["contrasena"];
            }
            $acceso_valido = password_verify($contrasena, $pasword_cifrada);
            if ($acceso_valido) {
                ?>
                <div class="alert alert-success">Bienvenido a la pagina</div>  
                <?php
                session_start();
                header('location: index.php');
                $_SESSION["usuario"]=$usuario;
            } else {
                ?>
                <div class="alert alert-danger">No coinciden las contraseñas</div>
                <?php
            }
        }
    }
    ?>
    <div class="container">
        <h1>LogIn</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario: </label>
                <input class="form-control" type="text" name="usuario">

            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña: </label>
                <input class="form-control" type="password" name="contrasena">

            </div>
            <input class="btn btn-primary" type="submit" value="LogIn">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>