
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funicones propias</title>
</head>
<body>
<?php

// 1. Generar saludo personalizado
function generarSaludo($nombre) {
    return "<h1>Hola, $nombre!</h1>";
}

// 2. Calcular el precio total de un producto
function calcularTotal($precio, $cantidad, $impuesto) {
    $total = $precio * $cantidad;
    $totalConImpuesto = $total + ($total * ($impuesto / 100));
    return $totalConImpuesto;
}

// 3. Generar un resumen acortado
function generarResumen($texto, $limite) {
    return (strlen($texto) > $limite) ? substr($texto, 0, $limite) . "..." : $texto;
}

// 4. Conversión de temperaturas
function convertirTemperatura($temperatura, $escala) {
    if ($escala === "C") {
        return ($temperatura - 32) * 5 / 9; // Fahrenheit a Celsius
    } elseif ($escala === "F") {
        return ($temperatura * 9 / 5) + 32; // Celsius a Fahrenheit
    }
    return null; // Escala no válida
}

// 5. Cálculo de edad a partir del año de nacimiento
function calcularEdad($anioNacimiento) {
    return date("Y") - $anioNacimiento;
}

// 6. Determinar si un número es par o impar
function esPar($numero) {
    return $numero % 2 === 0;
}

// 7. Generar enlace de descarga
function generarEnlaceDescarga($archivo) {
    return "<a href='$archivo'>Descargar</a>";
}

// 8. Calcular descuento aplicado
function calcularDescuento($precioOriginal, $descuento) {
    return $precioOriginal - ($precioOriginal * ($descuento / 100));
}

// 9. Conversión de horas a minutos
function convertirHorasMinutos($horas) {
    return $horas * 60;
}

// Ejemplos de uso
echo generarSaludo("Juan") . "<br>";
echo "Total con impuesto: " . calcularTotal(100, 2, 21) . "<br>";
echo "Resumen: " . generarResumen("Este es un texto de ejemplo que excede el límite de caracteres.", 30) . "<br>";
echo "Temperatura en Celsius: " . convertirTemperatura(32, "C") . "<br>";
echo "Edad: " . calcularEdad(1990) . "<br>";
echo "¿Es par?: " . (esPar(4) ? "Sí" : "No") . "<br>";
echo generarEnlaceDescarga("archivo.pdf") . "<br>";
echo "Precio con descuento: " . calcularDescuento(100, 20) . "<br>";
echo "Minutos: " . convertirHorasMinutos(2) . "<br>";

?>

</body>
</html>