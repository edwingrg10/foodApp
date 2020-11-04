<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MiniMarket</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(assets/img/login.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img src="assets/img/foodApp.png" class="rounded mx-auto d-block" alt="..." width="180px">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registrarse </h1>
                  </div>
                  <form class="user" action="createAccount.php" method="post">

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="cedula" placeholder="Cedula" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="primer_nombre" placeholder="Primer Nombre" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="segundo_nombre" placeholder="Segundo Nombre">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="primer_apellido" placeholder="Primer Apellido" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="segundo_apellido" placeholder="Segundo Apellido" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="direccion" placeholder="Dirección" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="celular" placeholder="Celular" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="telefono" placeholder="Teléfono" required>
                    </div>

                    <div class="form-group">
                      <label for="">Fecha Nacimiento</label>
                      <input type="date" class="form-control form-control-user" name="fecha_nacimiento" placeholder="Fecha Nacimiento" required>
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Correo Electronico" required="">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="contrasena" placeholder="Contraseña" required>
                    </div>

                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "food_app");
                    $sql = "SELECT * FROM perfil";
                    $result = mysqli_query($conn, $sql);

                    ?>

                    <div class="form-group">
                      <label for="cod_perfil">Perfil</label>
                      <select class="form-control" id="cod_perfil" name="cod_perfil">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                          echo '<option value=' . $row['cod_perfil'] . '>' . $row['descripcion'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="button-panel">
                      <input class="btn btn-primary btn-user btn-block" type="submit" class="button" title="Log In" name="ingreso" value="Crear Cuenta"></input>
                    </div><br>

                  </form>
                  <div class="text-center">
                    <a class="small" href="login.html">Iniciar Sesión</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="index.html">Ir al Inicio</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>