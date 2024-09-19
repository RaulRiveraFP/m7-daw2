<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre Aleatori: Parell o Senar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .bloc {
            padding: 20px;
            border-radius: 10px;
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        .parell {
            background-color: #4CAF50; 
        }
        .senar {
            background-color: #FF5722; 
        }
    </style>
</head>
<body>
    <?php
    $nombre = rand(0, 100);

    if ($nombre % 2 == 0) {
        echo "<div class='bloc parell'>El nombre $nombre és Parell</div>";
    } else {
        echo "<div class='bloc senar'>El nombre $nombre és Senar</div>";
    }
    ?>
</body>
</html>
