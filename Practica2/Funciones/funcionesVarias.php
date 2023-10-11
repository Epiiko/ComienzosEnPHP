<?php
function eurosAYenes($valor)
{
    return $valor * 157.56;
}
function eurosADolares($valor)
{
    return $valor * 1.06;
}
function dolaresAEuros($valor)
{
    return $valor * 0.94;
}
function dolaresAYenes($valor)
{
    return $valor * 148.73;
}
function yenesADolares($valor)
{
    return $valor * 0.0067;
}
function yenesAEuros($valor)
{
    return $valor * 0.0063;
}
function conversor(int $cantidad, $tipo1, $tipo2)
{
    return match (true) {
        $tipo1 == $tipo2 => "Es la misma divisa",
        $tipo1 == "euro" and $tipo2 == "yen" => eurosAYenes($cantidad) . "¥",
        $tipo1 == "euro" and $tipo2 == "dolar" => eurosADolares($cantidad) . "$",
        $tipo1 == "dolar" and $tipo2 == "euro" => dolaresAEuros($cantidad) . "€",
        $tipo1 == "dolar" and $tipo2 == "yen" => dolaresAYenes($cantidad) . "¥",
        $tipo1 == "yen" and $tipo2 == "dolar" => yenesADolares($cantidad) . "$",
        $tipo1 == "yen" and $tipo2 == "euro" => yenesAEuros($cantidad) . "€",
        default => "Algo salio de manera inesperada",
    };
}
function sumatorio($limite)
{
    $sumatorio = 0;
    if ($limite < 0) {
        return "No se pueden hacer sumatorio desde negativo";
    } else if ($limite == 0) {
        return 0;
    } else {
        for ($i = 0; $i <= $limite; $i++) {
            $sumatorio += $i;
        }
        return "La suma de los numeros es de $sumatorio";
    }
}
function factorial($limite)
{
    $factorial = 1;
    if ($limite <= 0) {
        return "No se pueden hacer factorial desde negativo";
    }
    for ($i = 1; $i <= $limite; $i++) {
        $factorial *= $i;
    }
    return "El factorial de los numeros es de $factorial";
}
function eleccionCalculo($limite, $tipo)
{
    if ($tipo == "sumatorio") {
        return sumatorio($limite);
    } else {
        return factorial($limite);
    }
}
function comprobarEstado($existencias){
    return match (true){
        $existencias==0 => "Extinto",
        $existencias<=500 => "En peligro critico",
        $existencias<=2000 => "En peligro",
        $existencias>2000 => "Amenazado",
    };
}
