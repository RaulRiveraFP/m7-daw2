<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

include('conexio.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuaris WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuari = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $sql = "UPDATE usuaris SET nom = ?, email = ?, password = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nom, $email, $password, $rol, $id);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Usuari actualitzat correctament.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al actualitzar l'usuari.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Usuari</title>
      <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body>

<?php include('header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edita Usuari</h2>
    <form method="post">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($usuari['nom']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($usuari['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Contrasenya:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" class="form-control" required>
                <option value="admin" <?= $usuari['rol'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="usuari" <?= $usuari['rol'] == 'usuari' ? 'selected' : '' ?>>Usuari</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Canvis</button>
    </form>
</div>

<script src="plugins/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
