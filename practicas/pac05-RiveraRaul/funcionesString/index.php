<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// 1. Convertir texto a mayúsculas
function convertirMayusculas($texto) {
    return strtoupper($texto);
}

// 2. Contar palabras en un texto
function contarPalabras($texto) {
    return str_word_count($texto);
}

// 3. Obtener una subcadena
function obtenerSubcadena($texto, $inicio, $longitud) {
    return substr($texto, $inicio, $longitud);
}

// 4. Reemplazar palabras en una frase
function reemplazarPalabras($texto, $buscar, $reemplazar) {
    return str_replace($buscar, $reemplazar, $texto);
}

// 5. Invertir una cadena de texto
function invertirTexto($texto) {
    return strrev($texto);
}

// 6. Comparar dos strings
function compararStrings($cadena1, $cadena2) {
    return strcmp($cadena1, $cadena2) === 0;
}

// 7. Eliminar espacios en blanco
function eliminarEspacios($texto) {
    return trim($texto);
}

// 8. Contar ocurrencias de una palabra en un texto
function contarOcurrencias($texto, $palabra) {
    return substr_count($texto, $palabra);
}

// 9. Dividir una cadena en palabras
function dividirPalabras($texto) {
    return explode(" ", $texto);
}

// Ejemplos de uso
echo "Mayúsculas: " . convertirMayusculas("hola mundo") . "<br>";
echo "Cantidad de palabras: " . contarPalabras("Esto es un texto de ejemplo.") . "<br>";
echo "Subcadena: " . obtenerSubcadena("Este es un texto", 5, 2) . "<br>";
echo "Reemplazar palabras: " . reemplazarPalabras("Hola mundo", "mundo", "PHP") . "<br>";
echo "Texto invertido: " . invertirTexto("Hola") . "<br>";
echo "Comparar strings: " . (compararStrings("texto", "texto") ? "Iguales" : "Diferentes") . "<br>";
echo "Eliminar espacios: '" . eliminarEspacios("   Hola   ") . "'<br>";
echo "Ocurrencias: " . contarOcurrencias("Hola mundo, hola de nuevo", "hola") . "<br>";
print_r(dividirPalabras("Dividir en palabras"));

?>

</body>
</html>