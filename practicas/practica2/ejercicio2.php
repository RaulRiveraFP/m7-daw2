<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taules de Multiplicar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .taula {
            width: 120px;
            margin: 15px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .taula h3 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .taula p {
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php
    for ($i = 1; $i <= 11; $i++) {
        echo "<div class='taula'>";
        echo "<h3>Taula del $i</h3>";

        for ($j = 1; $j <= 9; $j++) {
            $resultat = $i * $j;
            echo "<p>$i &times; $j = $resultat</p>";
        }

        echo "</div>";
    }
    ?>
</body>
</html>
