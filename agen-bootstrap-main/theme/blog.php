<?php
// Conexión a la base de datos
$servername = "mysql-uf3.alwaysdata.net";
$username = "uf3";
$password = "Esencia3";
$dbname = "uf3_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$sql = "SELECT * FROM noticies ORDER BY data_publicacio DESC";
$result = $conn->query($sql);
?>
<html class="portfolio">
<head>
  <meta charset="utf-8">
  <title>Blog</title>

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
<div class="blog-container">
    <h2>Últimes Notícies</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="noticia-item">';
            echo '<h3><a href="detall_noticia.php?id='.$row["id"].'">'.$row["titol"].'</a></h3>';
            echo '<p><em>Publicada el '.$row["data_publicacio"].'</em></p>';
            echo '<p>'.substr($row["contingut"], 0, 150).'...</p>';
            echo '<a href="detall_noticia.php?id='.$row["id"].'">Llegir més</a>';
            echo '</div>';
        }
    } else {
        echo "<p>No hi ha notícies disponibles.</p>";
    }
    ?>
</div>
</html>
<?php
$conn->close();
?>
