<?php include '../../system/koneksi.php';
include('../../system/akses_guru.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Modul</title>
  <?php
  include('../fragments-guru/header.php');

  if (isset($_GET['idp']) && isset($_GET['idmd'])) {
    $id_pel = $_GET['idp'];
    $id_md = $_GET['idmd'];
  }
  // cari pelajaran berdasarkan id
  $sql = "SELECT * FROM tb_pelajaran WHERE id_pelajaran = '$id_pel'";
  $query = mysqli_query($koneksi, $sql);
  $data_pelajaran = mysqli_fetch_array($query);
  $nama_pelajaran = $data_pelajaran['judul_pelajaran'];

  $sql2 = "SELECT * FROM tb_modul WHERE id_modul = '$id_md'";
  $query2 = mysqli_query($koneksi, $sql2);


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
              <h1>Edit Modul</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Modul</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main Section -->
      <!-- general form elements -->
      <div class="card card-primary">
        <!-- form start -->
        <form action="proses_modul.php" method="POST">
          <div class="card-header">
            <a href="daftar_modul.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-3 mt-2">Kembali</a>
          </div>
          <div class=" card-body">
            <?php while ($row = mysqli_fetch_array($query2)) { ?>
              <input type="hidden" name="idp" value="<?= $row['id_pelajaran'] ?>">
              <input type="hidden" name="idmd" value="<?= $row['id_modul'] ?>">
              <div class="form-group">
                <label for="InputNama">Nama Pelajaran</label>
                <input type="text" class="form-control" id="InputNama" name="nama_pel" placeholder="Masukkan Nama Pelajaran" value="<?= $nama_pelajaran ?>" required readonly>
              </div>

              <div class="form-group">
                <label for="InputNama">Nama Modul</label>
                <input type="text" class="form-control" id="InputNama" name="nama_modul" placeholder="Masukkan Nama Modul" value="<?= $row['nama_modul'] ?>" required>
              </div>

            <?php } ?>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="editmodul">Submit</button>
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