<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Procesar el formulario de añadir noticia
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titol = $_POST['titol'];
    $contingut = $_POST['contingut'];

    // Consultar si el título ya existe
    $check_query = "SELECT * FROM noticies WHERE titol = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("s", $titol);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $error = "Una notícia amb aquest títol ja existeix!";
    } else {
        // Insertar la nueva noticia en la base de datos
        $insert_query = "INSERT INTO noticies (titol, contingut) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ss", $titol, $contingut);

        if ($stmt->execute()) {
            header("Location: adminPanel.php"); // Redirigir al panel de administración después de guardar
            exit();
        } else {
            $error = "Error al afegir la notícia: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir Notícia</title>
      <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php' ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Afegir Notícia</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="titol">Títol:</label>
                <input type="text" class="form-control" id="titol" name="titol" required>
            </div>
            <div class="form-group">
                <label for="contingut">Contingut:</label>
                <textarea class="form-control" id="contingut" name="contingut" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Afegir Notícia</button>
            <a href="adminPanel.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
