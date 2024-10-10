<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// 1. Sumar valores de un array
function sumarArray($numeros) {
    return array_sum($numeros);
}

// 2. Ordenar un array alfabéticamente
function ordenarArrayAlfabetico($nombres) {
    sort($nombres);
    return $nombres;
}

// 3. Filtrar elementos mayores a un valor
function filtrarMayores($numeros, $valor) {
    return array_filter($numeros, function($numero) use ($valor) {
        return $numero > $valor;
    });
}

// 4. Buscar un valor en un array
function buscarEnArray($array, $valor) {
    return in_array($valor, $array);
}

// 5. Contar elementos de un array
function contarElementos($array) {
    return count($array);
}

// 6. Obtener el valor máximo de un array
function obtenerMaximo($numeros) {
    return max($numeros);
}

// 7. Obtener el valor mínimo de un array
function obtenerMinimo($numeros) {
    return min($numeros);
}

// 8. Eliminar duplicados de un array
function eliminarDuplicados($array) {
    return array_unique($array);
}

// 9. Combinar dos arrays
function combinarArrays($array1, $array2) {
    return array_merge($array1, $array2);
}

// 10. Dividir un array en fragmentos
function dividirArray($array, $tamanio) {
    return array_chunk($array, $tamanio);
}

// Ejemplos de uso
$numeros = [1, 2, 3, 4, 5];
$nombres = ["Juan", "Pedro", "Ana", "Maria"];
$arrayDuplicados = [1, 2, 2, 3, 4, 4, 5];

echo "Suma: " . sumarArray($numeros) . "<br>";
print_r(ordenarArrayAlfabetico($nombres));
echo "<br>";
print_r(filtrarMayores($numeros, 3));
echo "<br>";
echo "Buscar en array (2): " . (buscarEnArray($numeros, 2) ? "Sí" : "No") . "<br>";
echo "Cantidad de elementos: " . contarElementos($numeros) . "<br>";
echo "Máximo: " . obtenerMaximo($numeros) . "<br>";
echo "Mínimo: " . obtenerMinimo($numeros) . "<br>";
print_r(eliminarDuplicados($arrayDuplicados));
echo "<br>";
print_r(combinarArrays($numeros, $nombres));
echo "<br>";
print_r(dividirArray($numeros, 2));

?>

</body>
</html>