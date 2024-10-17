<header class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid d-flex justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="assets/logo-mercadona.jpg" alt="logo-mercadona" class="img-fluid" style="height: 50px;">
        </a>

        <!-- Bienvenida y foto de perfil -->
        <div class="d-flex align-items-center">
            <h2 class="me-3 mb-0 px-4">Bienvenido, <?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>!</h2>
            <?php if (isset($_POST['foto'])): ?>
                <img src="<?php echo htmlspecialchars($_POST['foto']); ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
            <?php endif; ?>
        </div>
    </div>
</header>
