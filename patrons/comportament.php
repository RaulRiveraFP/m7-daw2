<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrons de Comportament</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>

    <h2>Patrons de Comportament</h2>
    <form method="GET" id="patternForm" action="">
        <select name="patro" onchange="updateFormAction(this)">
            <option value="">Selecciona un patró</option>
            <option value="strategy.php">Strategy</option>
            <option value="observer.php">Observer</option>
        </select>
    </form>

    <script>
        function updateFormAction(selectElement) {
            const form = document.getElementById('patternForm');
            // Actualiza el action del formulario al valor seleccionado en el select
            form.action = "/patrons/" + selectElement.value;
            form.submit(); // Envía el formulario y redirige automáticamente
        }
    </script>

</body>
</html>
