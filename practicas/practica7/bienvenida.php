<?php
// Array multidimensional amb la informació de cada casa
$casas_info = [
    "Gryffindor" => [
        "background_color" => "#740001",
        "text_color" => "#FFD700",
        "welcome_message" => "Coratge, valor i determinació. Benvingut a Gryffindor!",
        "message_background" => "#D3A625",
        "image" => "Gryffindor.jpg"
    ],
    "Hufflepuff" => [
        "background_color" => "#FFDB00",
        "text_color" => "#60605B",
        "welcome_message" => "Lleialtat, paciència i treball dur. Benvingut a Hufflepuff!",
        "message_background" => "#EEE117",
        "image" => "Hufflepuff.webp"
    ],
    "Ravenclaw" => [
        "background_color" => "#0E1A40",
        "text_color" => "#946B2D",
        "welcome_message" => "Intel·ligència, creativitat i saviesa. Benvingut a Ravenclaw!",
        "message_background" => "#5D5D5D",
        "image" => "ravenclaw.webp"
    ],
    "Slytherin" => [
        "background_color" => "#1A472A",
        "text_color" => "#AAAAAA",
        "welcome_message" => "Ambició, astúcia i lideratge. Benvingut a Slytherin!",
        "message_background" => "#5D5D5D",
        "image" => "slytherin.webp"
    ]
];

// Selecció aleatòria d'una casa
$casas = array_keys($casas_info);
$casa_seleccionada = $casas[array_rand($casas)];

// Dades de l'usuari
$nom = htmlspecialchars($_POST['nom']);
$cognoms = htmlspecialchars($_POST['cognoms']);

// Dades de la casa seleccionada
$casa = $casas_info[$casa_seleccionada];
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a la teva casa de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: <?= $casa['background_color']; ?>;
            color: <?= $casa['text_color']; ?>;
        }
        .welcome-message {
            background-color: <?= $casa['message_background']; ?>;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Benvingut a <?= $casa_seleccionada; ?></h1>
        <div class="welcome-message mt-4">
            <p><?= $casa['welcome_message']; ?></p>
            <p><?= $nom . ' ' . $cognoms; ?></p>
        </div>
        <div class="mt-4">
            <img src="images/<?= $casa['image']; ?>" alt="Escut de <?= $casa_seleccionada; ?>" class="img-fluid" style="max-width: 200px;">
        </div>
    </div>
</body>
</html>
