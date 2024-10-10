<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$stock = 5; // Cambia a 0 para probar el otro caso

if ($stock > 0) {
    echo "<p style='color: green;'>Producto disponible</p>";
} else {
    echo "<p style='color: red;'>Producto agotado</p>";
}
?>

</body>
</html>