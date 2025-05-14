<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Procesar el formulario de añadir FAQ
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pregunta = $_POST['pregunta'];
    $resposta = $_POST['resposta'];
    
    // Insertar la nueva FAQ en la base de datos
    $insert_query = "INSERT INTO faqs (pregunta, resposta) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ss", $pregunta, $resposta);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        $error = "Error al afegir la FAQ: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir FAQ</title>
      <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>
            <?php include 'header.php' ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Afegir FAQ</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="pregunta">Pregunta:</label>
                <input type="text" class="form-control" id="pregunta" name="pregunta" required>
            </div>
            <div class="form-group">
                <label for="resposta">Resposta:</label>
                <textarea class="form-control" id="resposta" name="resposta" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Afegir FAQ</button>
            <a href="adminPanel.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
