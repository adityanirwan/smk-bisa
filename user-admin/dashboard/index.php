<?php
include('../../system/akses_admin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../fragments-admin/header.php');
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include('../fragments-admin/nav.php');
        ?>

        <!-- Main Sidebar Container -->
        <?php
        include('../fragments-admin/sidebar.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Guru</span>
                                    <span class="info-box-number">
                                        2
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Siswa</span>
                                    <span class="info-box-number">2</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Mapel</span>
                                    <span class="info-box-number">2</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Modul</span>
                                    <span class="info-box-number">200</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Judul</h3>
                                </div>
                                <!-- /.card-header -->
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

        </div>
        <!-- /.col -->
    </div> -->
    </div>
    </section>
    <!-- /.content -->
    </div>

    <?php
    include('../fragments-admin/footer.php');
    ?>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>

    </div>
    <!-- ./wrapper -->

    <!-- Alert -->
    <?php if (isset($_SESSION['alert'])) {
        if ($_SESSION['alert'] != null) {
            echo "<script type='text/javascript'>
            $(document).Toasts('create', {
                $_SESSION[alert]
            })
        </script>";
        }
    }
    // reset alert session jadi kosong
    $_SESSION['alert'] = "";
    ?>
</body>

</html>