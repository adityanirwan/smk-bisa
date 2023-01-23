<?php
include('../system/akses_siswa.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../fragments/header.php');
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include('../fragments/nav.php');
        ?>

        <!-- Main Sidebar Container -->
        <?php
        include('../fragments/sidebar_siswa.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Pelajaran</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <h5 class="font-weight-bold">SQL</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, consequuntur!</p>
                                </div>
                                <div class="card-footer">
                                    <a href="modul.php" class="btn btn-success">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <h5 class="font-weight-bold">C++</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, consequuntur!</p>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-success">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

        <?php
        include('../fragments/footer.php');
        ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>