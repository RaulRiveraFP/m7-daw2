<?php
session_start();
include('array_enigmes.php'); // Incluimos el archivo de enigmas

// Comprobamos si el usuario ha llegado a la habitación correcta
if ($_SESSION['current_room'] != 2) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
$dificultat = $_SESSION['difficulty'];
$enigma = $enigmes[$dificultat][1]; // Tomamos el segundo enigma
$message = ''; // Para mostrar mensajes de éxito o error

// Comprobamos si se ha enviado una respuesta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = htmlspecialchars($_POST['answer']);
    if (strtolower($answer) == strtolower($enigma['resposta'])) {
        $_SESSION['current_room'] = 3; // Avanzamos a la siguiente habitación
        header('Location: room3.php');
        exit;
    } else {
        $message = "<div class='alert alert-danger mt-3'>Resposta incorrecta. ¡Intenta-ho de nou!</div>";
    }
}

// Obtenemos la imagen en base64 si existe
$imageSrc = $_SESSION['image'] ? 'data:image/jpeg;base64,' . $_SESSION['image'] : 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png'; // Imagen predeterminada
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitació 2</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitació 2</h2>
        <div class="text-center">
            <img src="<?= $imageSrc; ?>" alt="Imatge de perfil" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
        </div>
        <p class="card-text"><?= $enigma['pregunta']; ?></p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Resposta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        <?= $message; ?>
    </div>
</body>
</html>
