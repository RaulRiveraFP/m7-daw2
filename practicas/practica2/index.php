<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portada de la Pràctica</title>
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
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .link {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }
        .link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Portada de la Pràctica</h1>
        <a class="link" href="ejercicio1.php">Exercici 1: Nombres Parells</a><br>
        <a class="link" href="ejercicio2.php">Exercici 2: Taules de Multiplicar</a><br>
        <a class="link" href="ejercicio3.php">Exercici 3: Nombre Aleatori</a>
        <a class="link" href="extra1.php">Divisors d'un nombre i verificació de nombre primer</a>
        <a class="link" href="extra2.php"> L’home del temps</a>
    </div>
</body>
</html>
