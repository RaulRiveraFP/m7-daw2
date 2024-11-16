<?php
session_start(); // Iniciamos la sesión

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardamos los datos en la sesión
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['difficulty'] = $_POST['dificultat'];
    $_SESSION['current_room'] = 1; // El usuario empieza en la primera habitación

    // Subimos y convertimos la imagen a base64 si se ha proporcionado
    if ($_FILES['image']['name'] != '') {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $_SESSION['image'] = base64_encode($imageData); // Guardamos la imagen en base64
    } else {
        $_SESSION['image'] = ''; // No hay imagen
    }

    // Redirigimos a la primera habitación
    header('Location: room1.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inici</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://basementescaperoom.com/los-angeles/template/images/room-header-bg-thebasement.jpg'); background-size:cover; background-repeat: no-repeat;">
    <div class="card p-4 bg-dark text-white" style="width: 22rem;">
        <h2 class="card-title text-center">Benvingut!</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Nom:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dificultat" class="form-label">Nivell de Dificultat:</label>
                <select name="dificultat" id="dificultat" class="form-select" required>
                    <option value="">Selecciona un nivell</option>
                    <option value="facil">Fàcil</option>
                    <option value="mig">Mig</option>
                    <option value="dificil">Difícil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Puja una imatge de perfil (opcional):</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Comença el Joc</button>
        </form>
    </div>
</body>
</html>
