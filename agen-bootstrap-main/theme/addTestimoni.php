<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Procesar el formulario de añadir testimoni
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $testimoni = $_POST['testimoni'];
    
    // Insertar el nuevo testimoni en la base de datos
    $insert_query = "INSERT INTO testimonis (nom, testimoni) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ss", $nom, $testimoni);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        $error = "Error al afegir el testimoni: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir Testimoni</title>
      <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>
            <?php include 'header.php' ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Afegir Testimoni</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Nom de l'Usuari:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="testimoni">Testimoni:</label>
                <textarea class="form-control" id="testimoni" name="testimoni" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Afegir Testimoni</button>
            <a href="adminPanel.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
