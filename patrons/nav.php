<nav>
    <span id="index.php">🏠 Inici</span>
    <span id="estructurals.php">Estructurals</span>
    <span id="creacion.php">Creació</span>
    <span id="comportament.php">Comportament</span>
</nav>

<script>
    let menu = document.querySelector('nav');
    let items = menu.querySelectorAll('span');
    items.forEach(item => {
        item.addEventListener('click', function() {
            // Limpiar la URL actual sin recargar la página
            window.history.pushState({}, '', '/');  // Esto limpia la URL
            // Redirigir a la URL correspondiente
            window.location.href = item.id;
        });
    });
</script>
