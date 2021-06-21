<?php
    include('../../controllers/session.php');
    require_once('../../controllers/ApartamentoCrud.php');
    require_once('../../controllers/torreCrud.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $a = ApartamentoCrud::buscar($id);
        $torres = TorreCrud::listar();
    }

    
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img class="title-logo" src="../assets/title.png" alt="logo">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menú
            </div>

            <!-- Nav Item - USUARIOS -->
            <li class="nav-item">
                <a id="users-link" class="nav-link" href="gestor-usuarios.php">
                    <i class="fas fa-users"></i>
                    <span>Gestión de Usuarios</span>
                </a>
            </li>

            <!-- Nav Item - TORRES -->
            <li class="nav-item">
                <a id="torres-link" class="nav-link" href="gestor-torres.php">
                    <i class="fas fa-building"></i>
                    <span>Gestión de Torres</span>
                </a>
            </li>

            <!-- Nav Item - APARTAMENTOS -->
            <li class="nav-item">
                <a id="aptos-link" class="nav-link" href="gestor-aptos.php">
                    <i class="fas fa-door-closed"></i>
                    <span>Gestión de Apartamentos</span>
                </a>
            </li>

            <!-- Nav Item - INQUILINOS -->
            <li class="nav-item">
                <a id="tenants-link" class="nav-link" href="gestor-inquilinos.php">
                    <i class="fas fa-address-book"></i>
                    <span>Gestión de Inquilinos</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                       <!-- Nav Item - User Information -->
                       <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo"".$_SESSION['username'];?></span>
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../controllers/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="container">
                        <br>
                        <div class="row g-2">
                            <h1 class='h3 mb-0 text-gray-800 text-md-center col-md-12'>Detalle Apartamento</h1>
                            <br><br>
                            <div class="form-customed row g-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="torres">Torre</label>
                                        <select class="form-control" id="torres" disabled>
                                            <option value="<?php echo "".$a->getTorres_idTorre(); ?>" selected>
                                            <?php
                                                foreach($torres as $t){
                                                    if($t->getIdTorre() == $a->getTorres_idTorre()){
                                                        echo "".$t->getNombre();
                                                    }
                                                }
                                            ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="num_apto">N° de Apartamento</label>
                                    <input type="number" class="form-control" id="num_apto" value="<?php echo "".$a->getNum_apto(); ?>" disabled>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <label for="num_piso">N° de Piso</label>
                                    <input type="number" class="form-control" id="num_piso" value="<?php echo "".$a->getNum_piso(); ?>" disabled>
                                    <br>
                                </div>
                                <div class="col-12">
                                    <label for="area">Área en M²</label>
                                    <input type="text" class="form-control" id="area" value="<?php echo "".$a->getArea(); ?>" disabled>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-gray-800 text-left">Estado</label>
                                    <br>
                                    <label class="form-switch" id="estado">
                                        Ocupado
                                        <input class="col-md-1" type="checkbox" value="<?php echo "".$a->getEstado(); ?>" 
                                        <?php 
                                            if($a->getEstado()==1){
                                                echo " checked ";
                                            }
                                        ?>disabled>
                                        <i></i>
                                        Disponible
                                    </label>
                                    <br>
                                </div>
                                <div class="col-md-4"><a href="" hidden></a></div>
                                <div class="col-md-4">
                                    <a href="gestor-aptos.php" class="btn btn-info form-control" id="back">Volver atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Cerrar Sesión Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Si está seguro, haga clic en Cerrar Sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../controllers/logout.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="../js/tables.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<script src="../js/iframe.js"></script>

</html>