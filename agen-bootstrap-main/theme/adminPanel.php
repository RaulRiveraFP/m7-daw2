<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Consultas para obtener los elementos de cada entidad
$usuaris_query = "SELECT * FROM usuaris";
$noticies_query = "SELECT * FROM noticies";
$portfolio_query = "SELECT * FROM portfoli";
$testimonis_query = "SELECT * FROM testimonis";
$faqs_query = "SELECT * FROM faqs";
$comentaris_query = "SELECT * FROM comentaris";

$usuaris_result = $conn->query($usuaris_query);
$noticies_result = $conn->query($noticies_query);
$portfolio_result = $conn->query($portfolio_query);
$testimonis_result = $conn->query($testimonis_query);
$faqs_result = $conn->query($faqs_query);
$comentaris_result = $conn->query($comentaris_query);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panell d'Administració</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <?php include 'header.php' ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Panell d'Administració</h2>
        
        <div class="text-right mb-3">
            <a class="btn btn-success" href="addUser.php">Afegir Usuari</a>
            <a class="btn btn-success" href="addNews.php">Afegir Notícia</a>
            <a class="btn btn-success" href="addPortfolio.php">Afegir Portfolio</a>
            <a class="btn btn-success" href="addTestimoni.php">Afegir Testimoni</a>
            <a class="btn btn-success" href="addFaq.php">Afegir FAQ</a>
        </div>

        <h3>Usuaris</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuari = $usuaris_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $usuari['id'] ?></td>
                    <td><?= $usuari['nom'] ?></td>
                    <td><?= $usuari['email'] ?></td>
                    <td><?= $usuari['rol'] ?></td>
                    <td>
                        <a href="editUser.php?id=<?= $usuari['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteUser.php?id=<?= $usuari['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Notícies</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Contingut</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($noticia = $noticies_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $noticia['id'] ?></td>
                    <td><?= $noticia['titol'] ?></td>
                    <td><?= $noticia['contingut'] ?></td>
                    <td>
                        <a href="editNews.php?id=<?= $noticia['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteNews.php?id=<?= $noticia['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

              <h3>Portfolio</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $portfolio_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['titol'] ?></td>
                    <td><?= $item['descripcio'] ?></td>
                    <td>
                        <a href="editPortfolio.php?id=<?= $item['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deletePortfolio.php?id=<?= $item['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Testimonis</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Testimoni</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($testimoni = $testimonis_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $testimoni['id'] ?></td>
                    <td><?= $testimoni['nom'] ?></td>
                    <td><?= $testimoni['testimoni'] ?></td>
                    <td>
                        <a href="editTestimoni.php?id=<?= $testimoni['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteTestimoni.php?id=<?= $testimoni['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>FAQs</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pregunta</th>
                    <th>Resposta</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($faq = $faqs_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $faq['id'] ?></td>
                    <td><?= $faq['pregunta'] ?></td>
                    <td><?= $faq['resposta'] ?></td>
                    <td>
                        <a href="editFaq.php?id=<?= $faq['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteFaq.php?id=<?= $faq['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Comentaris</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom Usuari</th>
            <th>Notícia</th>
            <th>Comentari</th>
            <th>Data Comentari</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // Consulta para obtener los comentarios
        $comentaris_query = "SELECT c.id, c.id_usuari, c.id_noticia, c.contingut, c.data_comentari, u.nom AS nom_usuari, n.titol AS titol_noticia 
                             FROM comentaris c
                             JOIN usuaris u ON c.id_usuari = u.id
                             JOIN noticies n ON c.id_noticia = n.id";
        
        $comentaris_result = $conn->query($comentaris_query);

        if ($comentaris_result) {
            // Iterar sobre los comentarios
            while ($comentari = $comentaris_result->fetch_assoc()): 
        ?>
        <tr>
            <td><?= $comentari['id'] ?></td>
            <td><?= $comentari['nom_usuari'] ?></td>
            <td><?= $comentari['titol_noticia'] ?></td>
            <td><?= $comentari['contingut'] ?></td>
            <td><?= $comentari['data_comentari'] ?></td>
            <td>
                <a href="editComment.php?id=<?= $comentari['id'] ?>" class="btn btn-primary">Editar</a>
                <a href="deleteComment.php?id=<?= $comentari['id'] ?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; 
        } else {
            echo "Error en la consulta: " . $conn->error;
        }
        ?>
    </tbody>
</table>

    </div>
</body>
</html>
