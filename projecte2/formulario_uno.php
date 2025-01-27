<form action="index.php" method="GET">
    <label for="jugadors">Nombre de jugadors (1-5):</label>
    <input type="number" id="jugadors" name="jugadors" min="1" max="5" required>
    <label for="cartes">Nombre de cartes inicials:</label>
    <input type="number" id="cartes" name="cartes" min="1" max="7" required>
    <button type="submit">Inicia el joc</button>
</form>
