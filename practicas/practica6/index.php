<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadona productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h2 class="my-5">Productos disponibles</h2>

        <?php 
        include 'data/productos.php'; 
        include 'includes/funciones.php'; 
        generarTablaProductos($productos); 
        ?>

        <!-- Información de contacto -->
        <h2 class="my-5">Información de contacto</h2>
        <?php
        muestraInfoContacto($_POST['nombre'] ?? '', $_POST['telefono'] ?? '', $_POST['foto'] ?? '');
        ?>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
