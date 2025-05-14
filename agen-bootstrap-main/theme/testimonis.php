<?php
session_start(); // Asegúrate de que la sesión esté iniciada
?>
<?php
// Conexión a la base de datos
$servername = "mysql-uf3.alwaysdata.net";
$username = "uf3";
$password = "Esencia3";
$dbname = "uf3_db";


$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión ha sido exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM testimonis ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html class="portfolio" lang="es">
<head>
  <meta charset="utf-8">
  <title>Portfolio</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- theme meta -->
  <meta name="theme-name" content="agen" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>
<body>

<?php include('header.php'); ?>

<body>
<div class="testimonis-container">
    <h2>Què opinen els nostres clients</h2>
    <div class="testimonis-grid">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="testimoni-item">';
                echo '<img src="images/team/'.$row["foto"].'" alt="'.$row["nom"].' '.$row["cognom"].'">';
                echo '<h3>'.$row["nom"].' '.$row["cognom"].'</h3>';
                echo '<p>"'.$row["testimoni"].'"</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No hi ha testimonis disponibles.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
<?php
$conn->close();
?>
