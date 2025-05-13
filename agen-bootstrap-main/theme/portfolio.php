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

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Egen"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.php">Portfolio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="team.php">Team</a>
            <a class="dropdown-item" href="team-single.php">Team Details</a>
            <a class="dropdown-item" href="career.php">Career</a>
            <a class="dropdown-item" href="career-single.php">Career Details</a>
            <a class="dropdown-item" href="blog-single.php">Blog Details</a>
            <a class="dropdown-item" href="pricing.php">Pricing</a></a>
            <a class="dropdown-item" href="faqs.php">FAQ's</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
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
