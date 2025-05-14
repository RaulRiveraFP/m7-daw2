<?php
session_start();
include 'conexio.php'; // Ruta relativa corregida

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuaris WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($usuari = $result->fetch_assoc()) {
        if (password_verify($password, $usuari["password"])) {
            $_SESSION["usuari_id"] = $usuari["id"];
            $_SESSION["rol"] = $usuari["rol"];
            header("Location: index.php"); // Redirecció a la home
            exit(); // Important!
        } else {
            echo "Contrasenya incorrecta.";
        }
    } else {
        echo "Usuari no trobat.";
    }

    $stmt->close();
}
?>

<html class="login">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include('header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Iniciar Sessió</h2>
    <form method="post" class="w-50 mx-auto">
        <div class="form-group">
            <label for="email">Correu electrònic:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contrasenya:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sessió</button>
    </form>
    <p class="text-center mt-3">
        No tens compte? <a href="register.php">Registra't</a>
    </p>
</div>

</body>
</html>
