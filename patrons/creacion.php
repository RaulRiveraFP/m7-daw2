<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrons de Creació</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <h2>Patrons de Creació</h2>
    <form action="" method="GET">
    <select name="patro" onchange="redirectToPattern(this)">
        <option value="">Selecciona un patró</option>
        <option value="singleton.php">Singleton</option>
        <option value="factory.php">Factory</option>
    </select>
</form>

<script>
    function redirectToPattern(selectElement) {
        const selectedValue = selectElement.value;
        if (selectedValue) {
            window.location.href = 'patrons/' + selectedValue;
        }
    }
</script>


</body>
</html>