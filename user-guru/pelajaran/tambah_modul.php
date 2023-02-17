<?php
include "../../system/koneksi.php";
include('../../system/akses_guru.php');

$id_pel = "";
if (isset($_GET['idp'])) {
  $id_pel = $_GET['idp'];
}
// dapatkan data nama modul
$sql = "SELECT judul_pelajaran FROM tb_pelajaran WHERE id_pelajaran = '$id_pel'";
$query = mysqli_query($koneksi, $sql);
$data_pel = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Modul Baru</title>
  <?php
  include('../fragments-guru/header.php');
  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('../fragments-guru/nav.php');
    ?>

    <!-- Main Sidebar Container -->
    <?php
    include('../fragments-guru/sidebar.php');
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Modul</h1>

            </div>
            <div class="col-sm-6 mb-4">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Modul</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main Section -->
      <!-- general form elements -->
      <div class="card card-primary col-12">
        <!-- form start -->
        <form action="proses_modul.php" method="POST">
          <div class="card-header">
            <a href="daftar_modul.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-3 mt-2">Kembali</a>
          </div>
          <div class=" card-body">
            <div class="form-group">
              <input type="hidden" name="idp" value="<?= $id_pel ?>">
              <label for="InputNama">Nama Pelajaran</label>
              <input type="text" class="form-control" id="InputNama" name="namaPel" value="<?= $data_pel['judul_pelajaran'] ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="input_maodul">Nama Modul</label>
              <input type="text" class="form-control" id="input_modul" name="modul" required>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="tambahmodul">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

      <!-- general form elements -->
      <!-- End of Main Section -->
    </div>
    <?php
    include('../fragments-guru/footer.php');
    ?>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>
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
  </div>
  <!-- ./wrapper -->

</body>

</html>