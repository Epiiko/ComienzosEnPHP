<?php
function precioConIva(float $precio, string $iva): float
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
    return $precio + ($ivanumerico * $precio);
}
function salarioIrpf(float $salario): float
{
    $devengo = 0;
    $salariof = $salario;
    if ($salariof < 12.450) {
        $devengo += ($salariof * 0.19);
    } else if ($salariof < 20.200) {
        $devengo += (12450 * 0.19);
        $salariof -= 12450;
        $devengo += ($salariof * 0.24);
    } else if ($salariof < 35200) {
        $devengo += (12450 * 0.19);
        $salariof -= 12450;
        $devengo += (20200 * 0.24);
        $salariof -= 20200;
        $devengo += ($salariof * 0.3);
    } else if ($salariof < 60000) {
        $devengo += (12450 * 0.19);
        $salariof -= 12450;
        $devengo += (20200 * 0.24);
        $salariof -= 20200;
        $devengo += (35200 * 0.3);
        $salariof -= 35200;
        $devengo += ($salariof * 0.37);
    } else if ($salariof < 300000) {
        $devengo += (12450 * 0.19);
        $salariof -= 12450;
        $devengo += (20200 * 0.24);
        $salariof -= 20200;
        $devengo += (35200 * 0.3);
        $salariof -= 35200;
        $devengo += ($salariof * 0.37);
        $salariof -= 300000;
        $devengo += ($salariof * 0.45);
    }
    return $salario - $devengo;
}
function asignarNota(int $nota)
{
    return match (true) {
        $nota < 5 => "suspenso",
        $nota == 5 => "suficiente",
        $nota < 7 => "bien",
        $nota < 9 => "notable",
        $nota == 10 => "sobresaliente"
    };
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
function mayor(int $num1, int $num2, int $num3): String
{
    $mayor = $num1;
    if ($num2 > $mayor) {
        $mayor = $num2;
    }
    if ($num3 > $mayor) {
        $mayor = $num3;
    }
    if ($num1 === $num2 && $num1 === $num3) {
        return " Todos los numeros introducidos son iguales";
    } else {
        return "El valor mas grande es de: $mayor";
    }
}
function exponente(int $base, int $exponente)
{
    return $base ** $exponente;
}
function primos(int $cantidad)
{
    $primos = 0;
    $numerines=[];
    for ($x = 2; $primos < $cantidad; $x++) {
        $primo = true;
        for ($y = 2; $y < $x; $y++) {
            if ($x % $y == 0) {
                $primo = false;
            }
        }
        if ($primo) {
            $primos++;
            array_push($numerines, $primo);
        }
    }
}
