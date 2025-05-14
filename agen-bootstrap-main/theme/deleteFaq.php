<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de FAQ
if (isset($_GET['id'])) {
    $id_faq = $_GET['id'];

    // Eliminar la FAQ de la base de datos
    $delete_query = "DELETE FROM faqs WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id_faq);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de eliminar
        exit();
    } else {
        echo "Error al eliminar la FAQ: " . $conn->error;
    }
} else {
    echo "No se proporcionó ID de la FAQ!";
    exit();
}
?>
