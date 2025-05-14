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
// Obtenir la notícia segons l'ID passat per la URL
if(isset($_GET['id'])) {
    $id_noticia = $_GET['id'];
    $sql_noticia = "SELECT * FROM noticies WHERE id = $id_noticia";
    $result_noticia = $conn->query($sql_noticia);
    
    if ($result_noticia->num_rows > 0) {
        $noticia = $result_noticia->fetch_assoc();
    } else {
        echo "<p>Notícia no trobada.</p>";
        exit();
    }

    // Obtenir els comentaris associats a aquesta notícia
    $sql_comentaris = "
        SELECT c.contingut, c.data_comentari, u.nom, u.cognom
        FROM comentaris c
        INNER JOIN usuaris u ON c.id_usuari = u.id
        WHERE c.id_noticia = $id_noticia
        ORDER BY c.data_comentari DESC
    ";
    $result_comentaris = $conn->query($sql_comentaris);
}
?>

<html >
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

<?php include('header.php'); ?>
<body>

<div class="detall-container">
    <div class="detall-noticia-container">
        <h2><?php echo $noticia["titol"]; ?></h2>
        <p><em>Publicada el <?php echo $noticia["data_publicacio"]; ?></em></p>
        <p><?php echo $noticia["contingut"]; ?></p>
        <p><?php echo $noticia["contingut"]; ?></p>
        <?php echo '<img src="images/blog/' . $noticia["imatge"] . '" alt="post-thumb" class="card-img-top mb-2">'; ?>
        <h3>Comentaris</h3>
        <?php
        if ($result_comentaris->num_rows > 0) {
            while($comentari = $result_comentaris->fetch_assoc()) {
                echo '<div class="comentari-item">';
                echo '<p><strong>'.$comentari["nom"].' '.$comentari["cognom"].':</strong> '.$comentari["contingut"].'</p>';
                echo '<p><em>Comentat el '.$comentari["data_comentari"].'</em></p>';
                echo '</div>';
            }

        } else {
            echo "<p>No hi ha comentaris per aquesta notícia.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
<?php
$conn->close();
?>
