<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de testimonio
if (isset($_GET['id'])) {
    $id_testimoni = $_GET['id'];

    // Consultar el testimonio por ID
    $testimoni_query = "SELECT * FROM testimonis WHERE id = ?";
    $stmt = $conn->prepare($testimoni_query);
    $stmt->bind_param("i", $id_testimoni);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el testimonio
    if ($result->num_rows > 0) {
        $testimoni = $result->fetch_assoc();
    } else {
        echo "Testimonio no encontrado!";
        exit();
    }
} else {
    echo "No se proporcionó ID del testimonio!";
    exit();
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $testimoni = $_POST['testimoni'];

    // Actualizar el testimonio en la base de datos
    $update_query = "UPDATE testimonis SET nom = ?, testimoni = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssi", $nom, $testimoni, $id_testimoni);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        echo "Error al actualizar el testimonio: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Testimoni</title>
      <link rel="stylesheet" href="plugins/card-slider/css/style.css">

    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Testimoni</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($testimoni['nom']) ?>" required>
            </div>
            <div class="form-group">
                <label for="testimoni">Testimoni:</label>
                <textarea class="form-control" id="testimoni" name="testimoni" rows="5" required><?= htmlspecialchars($testimoni['testimoni']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar canvis</button>
        </form>
    </div>
</body>
</html>
