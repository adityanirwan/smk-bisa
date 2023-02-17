<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == "admin") {
        header("location:user-admin/dashboard");
    } else if ($_SESSION['level'] == "guru") {
        header("location:user-guru/dashboard");
    } else if ($_SESSION['level'] == "siswa") {
        header("location:user-siswa/dashboard");
    }
}
if (isset($_GET['pesan'])) {
    $login_gagal = $_GET['pesan'] == 'gagal' ? true : false;
}
// if (isset($_SESSION['level']) == "admin") {
//     header("location:user-admin/");
//     //echo "<script>window.location.href = 'http://localhost/kuliah/smk-bisa/index.php/';</script>";
// } else if (isset($_SESSION['level']) == "guru") {
//     header("location:user-guru/");
// } else if (isset($_SESSION['level']) == "siswa") {
//     header("location:user-siswa/");
//     //echo "<script>window.location.href = 'http://localhost/kuliah/smk-bisa/index.php/';</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Bisa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>SMK</b> Bisa</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masuk dengan akun anda</p>

                <form action="login_proses.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->


    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>

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

    <!-- <?php if (@$login_gagal) {
                echo "<script type='text/javascript'>
        $(document).Toasts('create', {
            title: 'Login Gagal',
            class: 'bg-danger',
            body : 'Username Atau Password Salah'
        })
    </script>";
            } ?> -->
</body>

</html>