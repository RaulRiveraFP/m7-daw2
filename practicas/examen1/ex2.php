<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple PHP</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            font-size: 2.5em;
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            color: #555;
            font-size: 2em;
            text-align: center;
            margin-top: 10px;
        }

        img {
            display: block;
            max-width: 300px;
            margin: 20px auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
            echo "<h1>Benvinguts a la Cartellera Marvel</h1>";
            
            echo "<h2>Pel·lícules disponibles aquesta setmana</h2>";
            
            echo '<img src="https://es.web.img3.acsta.net/pictures/14/03/10/10/35/587504.jpg" alt="Imatge de prova">';
        ?>
    </div>

</body>
</html>