<?php
// connexio.php
$conn = new mysqli("mysql-uf3.alwaysdata.net", "uf3", "Esencia3", "uf3_db");
if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}
?>
