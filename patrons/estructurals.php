<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrons Estructurals</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <h2>Patrons Estructurals</h2>
    <form action="" method="GET">
    <select name="patro" onchange="if(this.value) window.location.href='patrons/' + this.value">
        <option value="">Selecciona un patró</option>
        <option value="adapter.php">Adapter</option>
    </select>
</form>
</body>
</html>