<?php include '../../system/koneksi.php';
include('../../system/akses_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pelajaran</title>
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
    <!-- CRUD Modul -->

    <!-- Read Modul -->
    <?php
    $sql = "SELECT * FROM tb_pelajaran";
    $query = mysqli_query($koneksi, $sql);
    ?>
    <!-- /Read Modul -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6 ">
              <h1>Pilih Pelajaran</h1>
              <a href="tambah_pelajaran.php"><button class="btn btn-primary btn-sm mb-3 mt-2">Tambah</button>
                <a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pelajaran</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main Content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <?php
            while ($data = mysqli_fetch_array($query)) {
            ?>

              <div class='col-12'>
                <div class='card'>
                  <div class='card-header'>
                    <?= $data['judul_pelajaran'] ?>
                  </div>
                  <div class='card-footer'>
                    <div class="text-right">
                      <a href="materi.php?idp=<?= $data['id_pelajaran'] ?>"><button class='btn btn-primary btn-sm'>Lihat</button></a>
                      <a href="edit_pelajaran.php?idp=<?= $data['id_pelajaran'] ?>"><button class='btn btn-warning btn-sm'>Edit</button></a>
                      <a href="proses_pelajaran.php?hidp=<?= $data['id_pelajaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><button name="hapuspelajaran" class='btn btn-danger btn-sm'>Hapus</button></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <!-- /Main Content -->
    </div>
  </div>
  <!-- /CRUD Modul -->
  <!-- jQuery -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>

</body>

</html>