<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1b</title>
    <LINK REL=StyleSheet HREF="estilo.css" TYPE="text/css">

</head>

<body>
    <h1> Ejercicio 1 </h1>
    <?php
    $productos = array(
        ["Kinder Bueno", 2.33],
        ["Huesitos", 1.80],
        ["Kinder Joy", 3],
        ["Chocobom", 1]
    );
    ?>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio €</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $stock = 0;
            krsort($productos);
            foreach ($productos as $producto) {
                list($producto, $precio) = $producto;
                $stock++;
                $total += $precio;
                echo "<tr>
                    <td>$producto</td>
                    <td>$precio</td>                    
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    <?php echo "El total es: $total € <br> Hay un total de $stock productos"; ?>
    <BR></BR>
    <h1>Ejercicio 2</h1>
    <?php
    $beneficios = 0;
    $ventas = 0;
    for ($i = 0; $i < count($productos); $i++) {
        $productos[$i][2] = rand(1, 4);
        $productos[$i][3] = $productos[$i][1] * $productos[$i][2];
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio €</th>
                <th>Ventas Uds.</th>
                <th>Total €</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) {
                list($nombre, $precio, $vendido, $total) = $producto;
                echo "<tr>
                <td>$nombre</td>
                <td>$precio</td>
                <td>$vendido</td>
                <td>$total</td>
            <tr>";
                $beneficios += $total;
                $ventas += $vendido;
            }
            ?>
        </tbody>
    </table>
    <?php
    echo "El total de € ganados asciende a $beneficios €<br>
        El total de productos vendidos es de $ventas";
    ?>
    <h1>Ejercicio 3</h1>
    <?php
    $numerines = array();
    for ($i = 0; $i < 50; $i++) {
        array_push($numerines, $i);
    }
    print_r($numerines);
    echo "<br><br>";
    for ($i = 0; $i < 50; $i++) {
        if ($i % 3 == 0) {
            unset($numerines[$i]);
        }
    }
    print_r($numerines);
    ?>
    <h1>Ejercicio 4</h1>
    <?php
    $personas = array(
        ["Adrian", "Corrionero", rand(0, 100)],
        ["Nico", "Simpson", rand(0, 100)],
        ["Alberto", "Florido", rand(0, 100)],
        ["Inma", "Mujer", rand(0, 100)],
    );
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($personas as $individuo) {
                list($nombre, $apellido, $edad) = $individuo;
                //$a= match(true){

                //}
            }
            ?>
        </tbody>
    </table>
    <h1>Ejercicio IVA</h1>
    <?php
    function precioConIva(float $precio, string $iva): float{
        $total = 0;
        $ivanumerico = 0;
        $iva = strtoupper($iva);
        $ivanumerico = match ($iva) {
            "GENERAL" => 0.21,
            "REDUCIDO" => 0.10,
            "SUPERREDUCIDO" => 0.04,
            "SIN IVA" => 0
        };
        return $precio + ($ivanumerico * $precio);
    }
    function precioSinIva(float $precio, string $iva): float
    {
        $total = 0;
        $ivanumerico = 0;
        $iva = strtoupper($iva);
        $ivanumerico = match ($iva) {
            "GENERAL" => 0.21,
            "REDUCIDO" => 0.10,
            "SUPERREDUCIDO" => 0.04,
            "SIN IVA" => 0
        };
        return $precio - ($ivanumerico * $precio);
    }
    echo precioSinIva(precioConIva(100, "reducido"), "reducido");
    ?>
    <h1>Ejercicio RPF</h1>
    
</body>

</html>