<?php
session_start();
require_once 'biblioteca.php';

$biblioteca = unserialize($_SESSION['biblioteca']);
$resultats = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['buscar'])) {
    $text = $_GET['titol'];
    $resultats = $biblioteca->cercarLlibre($text);
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cercar llibres</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Cercar llibres</h1>
        
        <!-- Formulari per buscar llibres -->
        <form method="GET" class="mb-6">
            <input type="text" name="titol" placeholder="Cerca pel títol" class="p-2 border rounded w-full" required>
            <button type="submit" name="buscar" class="mt-4 px-4 py-2 bg-green-500 text-white rounded">Cercar</button>
        </form>

        <!-- Mostrar resultats -->
        <h2 class="text-xl font-bold mb-4">Resultats</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($resultats as $llibre): ?>
                <div class="p-4 border rounded bg-gray-50 shadow">
                    <img src="<?= htmlspecialchars($llibre->foto) ?>" alt="Portada" class="w-full h-40 object-cover rounded mb-2">
                    <h3 class="font-semibold"><?= htmlspecialchars($llibre->titol) ?></h3>
                    <p><?= htmlspecialchars($llibre->autor) ?> (<?= htmlspecialchars($llibre->anyPublicacio) ?>)</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
