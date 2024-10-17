<?php
function generarTablaProductos($productos) {
    echo '<table class="table">';
    echo '<thead><tr><th>Producto</th><th>Precio</th><th>Disponibilidad</th></tr></thead>';
    echo '<tbody>';
    foreach ($productos as $producto) {
        $nombreProducto = ucfirst($producto['nombre']);
        $precioProducto = number_format($producto['precio'], 2);
        $disponibilidad = $producto['disponible'] ? 'En stock' : 'Agotado';
        $claseFila = $producto['disponible'] ? '' : 'table-danger';

        echo "<tr class='{$claseFila}'>
                <td>{$nombreProducto}</td>
                <td>{$precioProducto} €</td>
                <td>{$disponibilidad}</td>
              </tr>";
    }
    echo '</tbody></table>';
}

function muestraInfoContacto($nombre, $telefono, $foto) {
    echo '<div class="mt-4">';
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<img src='$foto' alt='Foto de perfil' class='img-fluid' style='width: 100px; height: 100px;'>";
    echo '</div>';
}
