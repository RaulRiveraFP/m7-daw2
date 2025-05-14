<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de noticia
if (isset($_GET['id'])) {
    $id_noticia = $_GET['id'];

    // Consultar la noticia por ID
    $noticia_query = "SELECT * FROM noticies WHERE id = ?";
    $stmt = $conn->prepare($noticia_query);
    $stmt->bind_param("i", $id_noticia);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró la noticia
    if ($result->num_rows > 0) {
        $noticia = $result->fetch_assoc();
    } else {
        echo "Notícia no trobada!";
        exit();
    }
} else {
    echo "No s'ha proporcionat ID de la notícia!";
    exit();
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titol = $_POST['titol'];
    $contingut = $_POST['contingut'];

    // Actualizar la noticia en la base de datos
    $update_query = "UPDATE noticies SET titol = ?, contingut = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssi", $titol, $contingut, $id_noticia);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
        exit();
    } else {
        echo "Error al actualitzar la notícia: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícia</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="plugins/card-slider/css/style.css">

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Notícia</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label for="titol">Títol:</label>
                <input type="text" class="form-control" id="titol" name="titol" value="<?= htmlspecialchars($noticia['titol']) ?>" required>
            </div>
            <div class="form-group">
                <label for="contingut">Contingut:</label>
                <textarea class="form-control" id="contingut" name="contingut" rows="5" required><?= htmlspecialchars($noticia['contingut']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar canvis</button>
        </form>
    </div>
</body>
</html>
