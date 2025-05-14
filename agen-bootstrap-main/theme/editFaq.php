<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de FAQ
if (isset($_GET['id'])) {
    $id_faq = $_GET['id'];

    // Consultar la FAQ por ID
    $faq_query = "SELECT * FROM faqs WHERE id = ?";
    $stmt = $conn->prepare($faq_query);
    $stmt->bind_param("i", $id_faq);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró la FAQ
    if ($result->num_rows > 0) {
        $faq = $result->fetch_assoc();
    } else {
        echo "FAQ no encontrada!";
        exit();
    }
} else {
    echo "No se proporcionó ID de la FAQ!";
    exit();
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pregunta = $_POST['pregunta'];
    $resposta = $_POST['resposta'];

    // Actualizar la FAQ en la base de datos
    $update_query = "UPDATE faqs SET pregunta = ?, resposta = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssi", $pregunta, $resposta, $id_faq);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        echo "Error al actualizar la FAQ: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar FAQ</title>
      <link rel="stylesheet" href="plugins/card-slider/css/style.css">

    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar FAQ</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label for="pregunta">Pregunta:</label>
                <input type="text" class="form-control" id="pregunta" name="pregunta" value="<?= htmlspecialchars($faq['pregunta']) ?>" required>
            </div>
            <div class="form-group">
                <label for="resposta">Respuesta:</label>
                <textarea class="form-control" id="resposta" name="resposta" rows="5" required><?= htmlspecialchars($faq['resposta']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>
