<?php
// index.php
include 'includes/header.php';
include 'data/productos.php';
include 'includes/funciones.php';
?>

<div class="container">
    <h2>Lista de Productos</h2>
    <?php generarTablaProductos($productos); ?>
</div>

<?php include 'includes/footer.php'; ?>
