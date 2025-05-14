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

$sql = "SELECT * FROM portfoli ORDER BY data DESC";
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

    <div class="portfolio-container">
        <h1>Nuestro Portfolio</h1>
        <div class="portfolio-grid">
            <?php
            if ($result->num_rows > 0) {
                // Mostrar los elementos del portfolio
                while($row = $result->fetch_assoc()) {
                    echo '<div class="portfolio-item">';
                    echo '<img src="images/'.$row["imatge"].'" alt="'.$row["titol"].'">';
                    echo '<h3>'.$row["titol"].'</h3>';
                    echo '<p>'.$row["descripcio"].'</p>';
                    echo '<span class="date">'.date("d-m-Y", strtotime($row["data"])).'</span>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay elementos en el portfolio.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
