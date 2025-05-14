<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

include('conexio.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuaris WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Usuari eliminat correctament.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar l'usuari.</div>";
    }
}
?>
