<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Joc</title>
    <style>
        /* Estils generals del formulari */
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Estil per a les etiquetes */
        label {
            font-weight: bold;
            color: #333;
        }

        /* Estil per als inputs */
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Estil per al botó */
        button {
            background: #007bff;
            color: white;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <form action="index.php" method="GET">
        <label for="jugadors">Nombre de jugadors (1-5):</label>
        <input type="number" id="jugadors" name="jugadors" min="1" max="5" required>
        
        <label for="cartes">Nombre de cartes inicials:</label>
        <input type="number" id="cartes" name="cartes" min="1" max="7" required>
        
        <button type="submit">Inicia el joc</button>
    </form>

</body>
</html>
