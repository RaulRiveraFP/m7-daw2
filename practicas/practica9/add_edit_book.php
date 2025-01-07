<?php
session_start();

// Verifica si el usuario tiene rol de admin, si no redirige a home.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit();
}

// Funciones para agregar y editar libros
function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $nuevoLibro = [
        'id' => uniqid(),  // Genera un ID único para el nuevo libro
        'titulo' => $titulo,
        'autor' => $autor,
        'imagen' => $imagen,
        'descripcion' => $descripcion
    ];
    $_SESSION['libros'][] = $nuevoLibro;
}

function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    foreach ($_SESSION['libros'] as &$libro) {
        if ($libro['id'] == $id) {
            $libro['titulo'] = $titulo;
            $libro['autor'] = $autor;
            $libro['imagen'] = $imagen;
            $libro['descripcion'] = $descripcion;
            break;
        }
    }
}

// Variables para el formulario (vacías por defecto)
$titulo = $autor = $imagen = $descripcion = '';
$action = 'Agregar Nuevo Libro';  // Acción predeterminada
$id = null;  // ID del libro a editar

// Si se pasa un id en la URL, cargamos los datos del libro
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['libros'] as $libro) {
        if ($libro['id'] == $id) {
            $titulo = $libro['titulo'];
            $autor = $libro['autor'];
            $imagen = $libro['imagen'];
            $descripcion = $libro['descripcion'];
            $action = 'Editar Libro';
            break;
        }
    }
}

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    // Validaciones básicas
    if (empty($titulo) || empty($autor)) {
        $error = "Los campos de título y autor son obligatorios.";
    } else {
        // Si es edición, actualizamos el libro, si es nuevo, lo agregamos
        if ($id) {
            editarLibro($id, $titulo, $autor, $imagen, $descripcion);
        } else {
            agregarLibro($titulo, $autor, $imagen, $descripcion);
        }

        // Redirigimos a home.php después de guardar los cambios
        header("Location: home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Agregar/Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center"><?= $action ?></h1>

    <!-- Mensaje de error si hay alguno -->
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <!-- Formulario para agregar/editar libro -->
    <form method="POST" action="add_edit_book.php<?= $id ? '?id=' . $id : '' ?>">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="<?= htmlspecialchars($autor) ?>" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (URL)</label>
            <input type="text" class="form-control" id="imagen" name="imagen" value="<?= htmlspecialchars($imagen) ?>">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($descripcion) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><?= $action ?></button>
        <a href="home.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
