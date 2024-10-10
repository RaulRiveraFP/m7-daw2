<?php
// funciones.php
function generarTablaProductos($productos) {
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Nombre</th><th>Precio</th><th>Disponibilidad</th><th>Descripción</th></tr></thead>';
    echo '<tbody>';

    foreach ($productos as $producto) {
        $nombreCapitalizado = ucfirst($producto['nombre']);
        $precioFormateado = number_format($producto['precio'], 2);
        $disponibilidad = $producto['disponibilidad'] ? "En stock" : "Agotado";
        $filaColor = $producto['disponibilidad'] ? "" : "table-danger"; // Color rojo si está agotado

        echo "<tr class='$filaColor'>";
        echo "<td>$nombreCapitalizado</td>";
        echo "<td>$$precioFormateado</td>";
        echo "<td>$disponibilidad</td>";
        echo "<td>{$producto['descripcion']}</td>";
        echo "</tr>";
    }

    echo '</tbody>';
    echo '</table>';
}
?>
