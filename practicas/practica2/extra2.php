<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificació de Temperatures</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .temp {
            padding: 15px;
            margin: 10px;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        .fred {
            background-color: #00aaff; /* Blau per a temperatures fredes */
        }
        .suau {
            background-color: #ffc107; /* Groc per a temperatures suaus */
        }
        .calor {
            background-color: #ff5722; /* Taronja per a temperatures caloroses */
        }
        .mitjana {
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Classificació de Temperatures</h1>

        <?php
        $total_temperatures = 10;
        $suma_temperatures = 0;

        for ($i = 0; $i < $total_temperatures; $i++) {
            $temp = rand(-10, 40); 
            $suma_temperatures += $temp;  

            if ($temp < 10) {
                echo "<div class='temp fred'>Temperatura: $temp°C - Fred</div>";
            } elseif ($temp >= 10 && $temp <= 25) {
                echo "<div class='temp suau'>Temperatura: $temp°C - Temperatura Suau</div>";
            } else {
                echo "<div class='temp calor'>Temperatura: $temp°C - Calor</div>";
            }
        }

        $mitjana = $suma_temperatures / $total_temperatures;

        echo "<div class='mitjana'>Mitjana de temperatures: " . round($mitjana, 2) . "°C</div>";
        ?>
    </div>
</body>
</html>
