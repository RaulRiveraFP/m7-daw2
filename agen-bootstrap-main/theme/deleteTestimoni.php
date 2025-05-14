<?php
session_start();
include('conexio.php');

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['usuari_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Verificar si se ha recibido un ID de testimonio
if (isset($_GET['id'])) {
    $id_testimoni = $_GET['id'];

    // Eliminar el testimonio de la base de datos
    $delete_query = "DELETE FROM testimonis WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id_testimoni);

    if ($stmt->execute()) {
        header("Location: adminPanel.php"); // Redirigir al panel de administración después de eliminar
        exit();
    } else {
        echo "Error al eliminar el testimonio: " . $conn->error;
    }
} else {
    echo "No se proporcionó ID del testimonio!";
    exit();
}
?>
