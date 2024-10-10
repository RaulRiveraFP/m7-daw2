<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$autenticado = true; // Cambia a false para probar el otro caso

if ($autenticado) {
    echo "<h2>Bienvenido, usuario!</h2>";
} else {
    echo "<h2>Por favor, inicie sesión.</h2>";
}
?>
</body>
</html>