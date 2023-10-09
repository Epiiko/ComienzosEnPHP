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
}?>
