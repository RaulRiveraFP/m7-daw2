<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de portafolio
if (isset($_GET['id'])) {
    $id_portfolio = $_GET['id'];

    // Eliminar el artículo de portafolio de la base de datos
    $delete_query = "DELETE FROM portfolio WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id_portfolio);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de eliminar
        exit();
    } else {
        echo "Error al eliminar el artículo de portafolio: " . $conn->error;
    }
} else {
    echo "No se proporcionó ID del artículo del portafolio!";
    exit();
}
?>
