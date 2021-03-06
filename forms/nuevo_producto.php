<?php
require_once('../Insertar/Insertar_Tipo_producto.php');

$error_cod = "";
$error_desc = "";
$error_precio = "";
$frm_enviado = false;
$consultas = new consultas();
if (isset($_POST["guardar_tipo_producto"])) {

    $codigo = $_POST["codigo_producto"];
    $desc = $_POST["desc_producto"];
    $precio = $_POST["precio_producto"];
    $estado = array();

    if (isset($_POST["estado"])) {
        $estado = 1;
    } else {
        $estado = 0;
    }
    $valido = 0;

    if (!$codigo == "") {
        $exist = $consultas->buscar($codigo);
        if (!$exist) {

            $valido = $valido + 1;
        } else {
            $error_cod = "El código ya existe";
        }
    } else {
        $error_cod = "Por favor ingrese un código";
    }

    if (!$desc == "") {
        $valido = $valido + 1;
    } else {
        $error_desc = "Por favor ingrese una descripción";
    }
    if (!$precio == null) {
        $valido = $valido + 1;
    } else {
        $error_precio = "Por favor ingrese un precio";
    }

    if ($valido == 3) {
        $mensaje = $consultas->insertar_tipo_producto($codigo, $desc, $precio, $estado);
        header("location: http://localhost/foodapp/restaurant/producto.php");
    }
} ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>foodapp</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Menu -->
        <div class="menu"></div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <p>Perfil Restaurante</p>
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#logoutModal" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cerrar Sesión</span>
                                <img class="img-profile rounded-circle" src="../assets/img/foodApp.png">
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desea cerrar sesión ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Seleccione "Salir" si quiere cerrar sesión.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" href="../login.html">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="form-wrapper">
                        <div id="wrapper">
                            <div id="content-wrapper" class="d-flex flex-column">
                                <div id="content">
                                    <app-nav></app-nav>
                                    <div class="container-fluid">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="p-5">
                                                    <div class="text-left">
                                                        <h1 class="h4 text-gray-900 mb-4">Creando Producto</h1>
                                                    </div>

                                                    <!--FORMULARIO -->

                                                    <form class="user" name="Insertar_Tipo_producto" action="" method="post">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control form-control-user" name="codigo_producto" id="codigo_producto" placeholder="Código" value="<?= (isset($codigo) && !$frm_enviado) ? $codigo : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_cod; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="desc_producto" id="desc_producto" placeholder="Descripción" value="<?= (isset($desc) && !$frm_enviado) ? $desc : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_desc; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control form-control-user" name="precio_producto" id="precio_producto" placeholder="Precio" value="<?= (isset($precio) && !$frm_enviado) ? $precio : null ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_precio; ?></span>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="estado" name="estado" checked>
                                                                <label class="custom-control-label" for="estado">Activo</label>
                                                            </div>
                                                        </div>
                                                        <a href="../restaurant/producto.php" class="btn btn-secondary">
                                                            Cancelar
                                                        </a>
                                                        <input type="submit" value="Guardar" class="btn btn-primary sm" name="guardar_tipo_producto">
                                                        <hr>
                                                    </form>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Begin Page Content -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; foodapp 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.menu').load('../restaurant/menu_component.php');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.nav').load('../restaurant/nav_component.php');
        });
    </script>

</body>

</html>