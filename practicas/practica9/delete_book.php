<?php
// Incluir el archivo de funciones
require_once 'functions.php';

// Iniciar la sesión para verificar el rol del usuario
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Si no es administrador, redirigir a home.php
    header("Location: home.php");
    exit();
}

// Verificar si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Llamar a la función eliminarLibro() para eliminar el libro
    eliminarLibro($id);

    // Redirigir a home.php después de eliminar el libro
    header("Location: home.php");
    exit();
} else {
    // Si no se proporciona un ID válido, redirigir a home.php
    header("Location: home.php");
    exit();
}
?>
