<!DOCTYPE html>
<html lang="en">
<?php include("../conexion/conexion.php");

$modelo = new Db();
$conexion = $modelo->conectar();
$sentencia =  "SELECT * FROM producto where estado = 1";
$resultado = $conexion->prepare($sentencia);
$resultado->execute();
$lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FoodApp</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="home.php"><span>FoodApp</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="home.php">Inicio</a></li>
          <li><a href="#restaurantes">Productos</a></li>
          <li><a>Edwin Garzón</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>FoodApp</span> Restaurante</h2>
                <p class="animate__animated animate__fadeInUp">FoodApp es una aplicación la cual se enfoca en ofrecer
                  sabores exclusivos a sus comensales, con ingredientes importados, artesanales, recetas tradicionales o
                  con variaciones que le den un mejor sabor.</p>
                <div>
                  <a href="#restaurantes" class="btn-menu animate__animated animate__fadeInUp scrollto">Nuestros Restaurantes</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Chefs Section ======= -->
    <section id="restaurantes" class="restaurantes">
      <div class="container">

        <div class="section-title">
          <h2> <span>Nuestros</span></h2>
          <p>Productos</p>
        </div>

        <div class="row">

          <?php
          foreach ($lista as $dato) {
          ?>

            <div class="card" style="width: 23rem;">
              <div class="card-body">
                <b class="card-title"><?php echo $dato["desc_producto"] ?> </b><br><br>
                <p class="card-text">Precio $ <?php echo $dato["precio"] ?> </p>
                <a href="product_list.php" class="btn btn-primary">Agregar al carrito</a>
              </div>
            </div>

          <?php } ?>

        </div>

      </div>
    </section><!-- End Chefs Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>FoodApp</h3>
      <p>FoodApp es una aplicación la cual se enfoca en ofrecer
        sabores exclusivos a sus comensales, con ingredientes importados, artesanales, recetas tradicionales o
        con variaciones que le den un mejor sabor.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>FoodApp</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>