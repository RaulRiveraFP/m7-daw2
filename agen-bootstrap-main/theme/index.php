<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<?php
// Conexión a la base de datos (ajusta con la configuración correcta)
$servername = "mysql-uf3.alwaysdata.net";
$username = "uf3";
$password = "Esencia3";
$dbname = "uf3_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión ha sido exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<head>
  <meta charset="utf-8">
  <title>Essència Natural</title>

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


<!-- banner -->
<section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
  data-background="images/banner.jpeg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Salut i benestar holístic</h1>
      </div>
    </div>
  </div>
</section>
<!-- /banner -->

<!-- service -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2 class="section-title">Els nostres serveis</h2>
        <p class="lead">Oferim teràpies naturals i holístiques per recuperar el teu benestar físic, mental i emocional. El nostre equip de professionals t'acompanya cap a una vida més saludable i equilibrada.</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4 active">
          <div class="card-body text-center">
            <div class="position-relative">
              <i class="icon-lg icon-box bg-gradient-primary rounded-circle ti-heart mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-heart"></i>
            </div>
            <h4 class="mb-4">Teràpia Emocional</h4>
            <p>Gestionem l'estrès, l'ansietat i l'equilibri emocional amb flors de Bach i sessions personalitzades.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-center">
            <div class="position-relative">
              <i class="icon-lg icon-box bg-gradient-primary rounded-circle ti-pulse mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-pulse"></i>
            </div>
            <h4 class="mb-4">Massatge i Reequilibri</h4>
            <p>Allibera tensions i recupera el benestar físic mitjançant tècniques manuals i naturals.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-center">
            <div class="position-relative">
              <i class="icon-lg icon-box bg-gradient-primary rounded-circle ti-apple mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-apple"></i>
            </div>
            <h4 class="mb-4">Assessorament Nutricional</h4>
            <p>Millora la teva salut amb una dieta equilibrada i consells nutricionals.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /service -->

<!-- feature -->
<section class="section bg-secondary position-relative">
  <div class="bg-image overlay-secondary">
    <img src="images/benestar-fons.jpg" alt="Centre de Benestar">
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="row align-items-center">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <img src="images/terapia.webp" alt="Sessió de teràpia natural" class="img-fluid">
          </div>
          <div class="col-lg-7 offset-lg-1">
            <div class="row">
              <div class="col-12">
                <h2 class="text-white">El teu benestar és la nostra prioritat</h2>
                <div class="section-border ml-0"></div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-face-smile mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Equilibri Emocional</h4>
                    <p class="text-light">Sessions personalitzades amb flors de Bach i teràpia emocional per ajudar-te a connectar amb tu mateix.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-hand-open mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Teràpies Manuals</h4>
                    <p class="text-light">Massatges relaxants i reequilibrants per alliberar tensions i millorar l'energia corporal.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-apple mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Nutrició Natural</h4>
                    <p class="text-light">Assessorament nutricional per millorar la salut a través d'una alimentació conscient i natural.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-microphone-alt mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Tallers i Xerrades</h4>
                    <p class="text-light">Espais d’aprenentatge i creixement sobre benestar, emocions i hàbits saludables.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- /feature -->

<!-- team -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>El nostre Equip</h2>
        <p>Professionals dedicats a ajudar-te a aconseguir el teu benestar físic i emocional.</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-1.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center position-relative zindex-1">
            <h4><a class="text-dark" href="team-single.php">Sara Adams</a></h4>
            <i>Terapeuta de Benestar</i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-2.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center position-relative zindex-1">
            <h4><a class="text-dark" href="team-single.php">Tom Bills</a></h4>
            <i>Especialista en Massatges</i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-3.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center position-relative zindex-1">
            <h4><a class="text-dark" href="team-single.php">Anna Walle</a></h4>
            <i>Nutricionista i Coach de Salut</i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-4.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center">
            <h4>Devid Json</h4>
            <i>Fundador i CEO</i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /team -->

<!-- about -->
<section class="section-lg position-relative bg-cover" data-background="images/backgrounds/about-bg.jpg">
  <img src="images/backgrounds/about-bg-overlay.png" alt="overlay" class="overlay-image img-fluid">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6 col-md-8 col-sm-7 col-8">
        <h2 class="text-white mb-4">Qui Som</h2>
        <p class="text-light mb-4">Som un grup de professionals dedicats a millorar el teu benestar físic i emocional. Oferim serveis especialitzats en teràpies naturals, massatges i nutrició personalitzada per ajudar-te a aconseguir el teu màxim potencial de salut.</p>
        <a href="about.php" class="btn btn-primary">Llegir Més</a>
      </div>
    </div>
  </div>
</section>

<!-- /about -->

<!-- blog -->
<?php
// Conexión y consulta a la base de datos
$sqlBlog = "SELECT * FROM noticies ORDER BY data_publicacio DESC LIMIT 3;";
$resultBlog = $conn->query($sqlBlog);
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Ultimes noticies</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <?php
      // Verificar si hay resultados
      if ($resultBlog->num_rows > 0) {
        // Iterar a través de los resultados
        while($row = $resultBlog->fetch_assoc()) {
          $id = $row["id"];
          $titol = $row["titol"];
          $data = date('F d, Y', strtotime($row["data_publicacio"])); // Formato de fecha
          $imatge = $row["imatge"]; // Asumiendo que la columna 'imatge' contiene el nombre de la imagen

          // Mostrar las noticias
          echo '<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">';
          echo '<article class="card">';
          echo '<img src="images/blog/' . $imatge . '" alt="post-thumb" class="card-img-top mb-2">';
          echo '<div class="card-body p-0">';
          echo '<time>' . $data . '</time>';
          echo '<a href="blog-single.php?id=' . $id . '" class="h4 card-title d-block my-3 text-dark hover-text-underline">' . $titol . '</a>';
          echo '<a href="blog-single.php?id=' . $id . '" class="btn btn-transparent">Read more</a>';
          echo '</div>';
          echo '</article>';
          echo '</div>';
        }
      } else {
        echo "No hay noticias disponibles.";
      }

      // Cerrar la conexión
      $conn->close();
      ?>
    </div>
  </div>
</section>
<!-- /blog -->


<!-- footer -->
<footer class="bg-secondary position-relative">
  <img src="images/backgrounds/map.png" class="img-fluid overlay-image" alt="">
  <div class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 col-6">
          <h4 class="text-white mb-5">About</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light d-block mb-3">Service</a></li>
            <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-6">
          <h4 class="text-white mb-5">Company</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light d-block mb-3">Service</a></li>
            <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="bg-white p-4">
            <h3>Contact us</h3>
            <form action="#">
              <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Full name">
              <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Email address">
              <textarea name="message" id="message" class="form-control mb-4 px-0" placeholder="Message"></textarea>
              <button class="btn btn-primary" type="submit">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pb-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-left">
          <p class="text-light mb-0">Copyright &copy; 2019 a theme by <a class="text-gradient-primary" href="https://themefisher.com">themefisher.com</a>
          </p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-right text-center">
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>