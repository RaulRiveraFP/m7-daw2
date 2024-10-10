<!-- header.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background-color: #343a40;
            color: white;
        }
        nav a {
            color: white;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="p-3">
        <div class="container">
            <h1>Tienda en Línea</h1>
            <nav>
                <a href="index.php">Inicio</a> |
                <a href="productos.php">Productos</a>
            </nav>
        </div>
    </header>
