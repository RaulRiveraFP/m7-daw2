<?php
session_start();
require_once 'biblioteca.php';

// Inicialitzar la biblioteca
if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = serialize(new Biblioteca());
}
$biblioteca = unserialize($_SESSION['biblioteca']);

// Afegir llibre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['afegir'])) {
    $nouLlibre = new Llibre(
        $_POST['titol'],
        $_POST['autor'],
        $_POST['any'],
        $_POST['foto']
    );
    $biblioteca->afegirLlibre($nouLlibre);
    $_SESSION['biblioteca'] = serialize($biblioteca);
}

// Cercar llibre
$resultats = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) {
    $text = $_POST['titol_buscar'];
    $resultats = $biblioteca->cercarLlibre($text);
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió de llibres</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-700 mb-6 text-center">Gestió de llibres</h1>
        
        <!-- Formulari per afegir llibres -->
        <form method="POST" class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Afegir llibre</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="titol" placeholder="Títol del llibre" class="p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="text" name="autor" placeholder="Autor" class="p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="number" name="any" placeholder="Any de publicació" class="p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="url" name="foto" placeholder="URL de la imatge" class="p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" name="afegir" class="mt-4 px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Afegir llibre</button>
        </form>

        <!-- Formulari per buscar llibres -->
        <form method="POST" class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Cercar llibre</h2>
            <div class="flex">
                <input type="text" name="titol_buscar" placeholder="Cerca pel títol" class="p-3 flex-grow border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <button type="submit" name="buscar" class="px-6 py-3 bg-green-500 text-white rounded-r hover:bg-green-600 transition">Cercar</button>
            </div>
        </form>

        <!-- Resultats de cerca -->
        <?php if (!empty($resultats)): ?>
            <h2 class="text-xl font-bold mb-4">Resultats de la cerca</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($resultats as $llibre): ?>
                    <div class="p-4 border rounded bg-gray-50 shadow hover:shadow-lg transition">
                        <img src="<?= htmlspecialchars($llibre->foto) ?>" alt="Portada" class="w-full h-40 object-cover rounded mb-2">
                        <h3 class="font-semibold"><?= htmlspecialchars($llibre->titol) ?></h3>
                        <p><?= htmlspecialchars($llibre->autor) ?> (<?= htmlspecialchars($llibre->anyPublicacio) ?>)</p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])): ?>
            <p class="text-red-500">No s'han trobat llibres amb el títol especificat.</p>
        <?php endif; ?>

        <!-- Mostrar tots els llibres -->
        <h2 class="text-xl font-bold mt-6 mb-4">Llibres actuals</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($biblioteca->mostrarLlibres() as $llibre): ?>
                <div class="p-4 border rounded bg-gray-50 shadow hover:shadow-lg transition">
                    <img src="<?= htmlspecialchars($llibre->foto) ?>" alt="Portada" class="w-full h-40 object-cover rounded mb-2">
                    <h3 class="font-semibold"><?= htmlspecialchars($llibre->titol) ?></h3>
                    <p><?= htmlspecialchars($llibre->autor) ?> (<?= htmlspecialchars($llibre->anyPublicacio) ?>)</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
