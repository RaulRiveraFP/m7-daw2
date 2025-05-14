<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de noticia
if (isset($_GET['id'])) {
    $id_noticia = $_GET['id'];

    // Eliminar la noticia de la base de datos
    $delete_query = "DELETE FROM noticies WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id_noticia);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de eliminar
        exit();
    } else {
        echo "Error al eliminar la notícia: " . $conn->error;
    }
} else {
    echo "No s'ha proporcionat ID de la notícia!";
    exit();
}
?>
