<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisors i Nombre Primer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
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
        h1, h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .divisor {
            background-color: #007BFF;
            color: white;
            margin: 5px;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .primer {
            background-color: #28a745;
            color: white;
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        .no-primer {
            background-color: #FF5722;
            color: white;
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $nombre = rand(1, 100);
        echo "<h1>Nombre generat: $nombre</h1>";

        $comptador_divisors = 0;

        echo "<h2>Divisors del nombre $nombre:</h2>";

        for ($i = 1; $i <= $nombre; $i++) {
            if ($nombre % $i == 0) {
                $comptador_divisors++;
                echo "<div class='divisor'>$i</div>";
            }
        }

        if ($comptador_divisors == 2) {
            echo "<div class='primer'>El nombre $nombre és primer.</div>";
        } else {
            echo "<div class='no-primer'>El nombre $nombre no és primer.</div>";
        }
        ?>
    </div>
</body>
</html>
