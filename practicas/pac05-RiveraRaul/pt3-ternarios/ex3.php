<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$nombre = ""; // Cambia el valor para probar el otro caso
?>

<form action="#" method="post">
    Nombre: <input type="text" name="nombre" value="<?php echo !empty($nombre) ? $nombre : 'Ingrese su nombre'; ?>">
    <input type="submit" value="Enviar">
</form>

</body>
</html>