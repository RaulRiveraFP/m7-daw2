<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

include('conexio.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuaris (nom, email, password, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nom, $email, $password, $rol);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Usuari afegit correctament.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al afegir l'usuari.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir Usuari</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">

</head>
<body>

<?php include('header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Afegir Usuari</h2>
    <form method="post">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contrasenya:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="usuari">Usuari</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Afegir Usuari</button>
    </form>
</div>

<script src="plugins/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
