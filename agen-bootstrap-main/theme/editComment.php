<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de comentario
if (isset($_GET['id'])) {
    $id_comentari = $_GET['id'];

    // Consultar el comentario por ID
    $comentari_query = "SELECT * FROM comentaris WHERE id = ?";
    $stmt = $conn->prepare($comentari_query);
    $stmt->bind_param("i", $id_comentari);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el comentario
    if ($result->num_rows > 0) {
        $comentari = $result->fetch_assoc();
    } else {
        echo "Comentario no encontrado!";
        exit();
    }
} else {
    echo "No se proporcionó ID de comentario!";
    exit();
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contingut = $_POST['contingut'];

    // Actualizar el comentario en la base de datos
    $update_query = "UPDATE comentaris SET contingut = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $contingut, $id_comentari);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        echo "Error al actualizar el comentario: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comentari</title>
      <link rel="stylesheet" href="plugins/card-slider/css/style.css">
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Comentari</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label for="contingut">Comentari:</label>
                <textarea class="form-control" id="contingut" name="contingut" rows="5" required><?= htmlspecialchars($comentari['contingut']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>
