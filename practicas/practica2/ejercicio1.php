<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombres Parells entre 50 i 500</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        div {
            width: 50px;
            height: 50px;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }
        h1{
            text-align: center;
            display: flex;
            justify-content: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Números pares del 50 al 500</h1>
    <?php
    for ($i = 50; $i <= 500; $i++) {
        if ($i % 2 == 0) {
            echo "<div>$i</div>";
        }
    }
    ?>
</body>
</html>
