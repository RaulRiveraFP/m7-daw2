<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de portafolio
if (isset($_GET['id'])) {
    $id_portfolio = $_GET['id'];

    // Consultar el portafolio por ID
    $portfolio_query = "SELECT * FROM portfolio WHERE id = ?";
    $stmt = $conn->prepare($portfolio_query);
    $stmt->bind_param("i", $id_portfolio);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el portafolio
    if ($result->num_rows > 0) {
        $portfolio = $result->fetch_assoc();
    } else {
        echo "Elemento de portafolio no encontrado!";
        exit();
    }
} else {
    echo "No se proporcionó ID del portafolio!";
    exit();
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titol = $_POST['titol'];
    $descripcio = $_POST['descripcio'];

    // Actualizar el portafolio en la base de datos
    $update_query = "UPDATE portfolio SET titol = ?, descripcio = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssi", $titol, $descripcio, $id_portfolio);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        echo "Error al actualizar el portafolio: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Portafolio</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="plugins/card-slider/css/style.css">

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Portafolio</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label for="titol">Títol:</label>
                <input type="text" class="form-control" id="titol" name="titol" value="<?= htmlspecialchars($portfolio['titol']) ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcio">Descripció:</label>
                <textarea class="form-control" id="descripcio" name="descripcio" rows="5" required><?= htmlspecialchars($portfolio['descripcio']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar canvis</button>
        </form>
    </div>
</body>
</html>
