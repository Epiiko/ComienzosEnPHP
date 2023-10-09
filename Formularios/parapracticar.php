<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
</head>
<body>
    <h1>FORM 1</h1>
    <form action="" method="get">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">
        <br><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos">
        <br><br>
        <button type="sumbit" value="Enviar">ENVIAR</button>
    </form>
    <?php
    if(($_SERVER["REQUEST_METHOD"])=="GET"){
        echo "<h3>Formulario enviado!</h3>";
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellidos"];
        echo "<h3>Nombre completo: $nombre $apellido </h3>";
    }
    ?>
    <h1>FORM EXPONENCIAS</h1>
    <form action="" method="get">
        <label for="base">Base: </label>
        <input type="text" name="base">
        <br><br>
        <label for="exponente">Exponente: </label>
        <input type="text" name="exponente">
        <br><br>
        <button type="sumbit" value="Enviar">ENVIAR</button>
    </form>
    <?php
    function exponente(int $base, int $exponente){
       return $base**$exponente;
    }
    if(($_SERVER["REQUEST_METHOD"])=="GET"){
        $base=(int)$_GET["base"];
        $exponente=(int)$_GET["exponente"];
        echo "<h3>El resultado es de: " . exponente($base, $exponente) . "</h3>";
    }
    ?>
</body>
</html>