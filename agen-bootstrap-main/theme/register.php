<?php
include 'conexio.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $cognom = $_POST["cognom"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $rol = 'user'; // per defecte

    $stmt = $conn->prepare("INSERT INTO usuaris (nom, cognom, email, password, rol) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nom, $cognom, $email, $password, $rol);
    
    if ($stmt->execute()) {
        echo "Usuari registrat correctament!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Sign up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include('header.php'); ?>

<div class="container register">
    <h2 class="text-center mb-4">Registra’t</h2>
    <form method="post" class="w-50 mx-auto">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cognom">Cognom:</label>
            <input type="text" name="cognom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Correu electrònic:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contrasenya:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    <p class="text-center mt-3">
        Ja tens compte? <a href="login.php">Inicia sessió</a>
    </p>
</div>

</body>
</html>
