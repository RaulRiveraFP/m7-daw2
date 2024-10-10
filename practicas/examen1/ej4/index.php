<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llista de Productes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .oferta {
            background-color: #d4edda; /* Fons verd clar per destacar */
        }
    </style>
</head>
<body>

    <h1>Llista de Productes</h1>

    <table>
        <tr>
            <th>Nom del Producte</th>
            <th>Preu</th>
        </tr>

        <?php
        $productes = [
            ["nom" => "Televisor 4K", "preu" => 499.99, "oferta" => true],
            ["nom" => "Portàtil Gaming", "preu" => 999.99, "oferta" => false],
            ["nom" => "Auriculars sense fil", "preu" => 59.99, "oferta" => true],
            ["nom" => "Smartwatch", "preu" => 199.99, "oferta" => false],
            ["nom" => "Càmera fotogràfica", "preu" => 299.99, "oferta" => true]
        ];

        foreach ($productes as $producte) {
            $classe_oferta = $producte["oferta"] ? 'class="oferta"' : '';

            echo "<tr $classe_oferta>";
            echo "<td>".$producte["nom"]."</td>";
            echo "<td>".$producte["preu"]." €</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>
