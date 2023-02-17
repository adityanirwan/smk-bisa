<?php include '../../system/koneksi.php';
include('../../system/akses_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pelajaran</title>
  <?php
  include('../fragments-admin/header.php');

  if (isset($_GET['idp'])) {
    $id_pel = $_GET['idp'];
  }
  // cari modul berdasarkan id
  $sql = "SELECT * FROM tb_pelajaran WHERE id_pelajaran = $id_pel";
  $query = mysqli_query($koneksi, $sql);
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
            <div class="col-sm-6">
              <h1>Edit Pelajaran</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Pelajaran</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main Section -->
      <!-- general form elements -->
      <div class="card card-primary">
        <!-- form start -->
        <form action="proses_pelajaran.php" method="POST">
          <div class="card-header">
            <a href="daftar_modul.php" class="btn btn-warning btn-sm mb-3 mt-2">Kembali</a>
          </div>
          <div class=" card-body">
            <?php while ($row = mysqli_fetch_array($query)) { ?>
              <input type="hidden" name="idp" value="<?= $row['id_pelajaran'] ?>">
              <div class="form-group">
                <label for="InputNama">Nama Modul</label>
                <input type="text" class="form-control" id="InputNama" name="nama" placeholder="Masukkan Nama" value="<?= $row['judul_pelajaran'] ?>" required>
              </div>

              <div class="form-group">
                <label for="InputDesc">Deskripsi Modul</label>
                <textarea class="form-control" name="desc" id="InputDesc" class="form-control" cols="30" rows="10"><?= $row['desc_pelajaran'] ?></textarea>
              </div>
            <?php } ?>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="editpel">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

      <!-- general form elements -->
      <!-- End of Main Section -->
    </div>
    <?php
    include('../fragments-admin/footer.php');
    ?>

  </div>
  <!-- ./wrapper -->

</body>

</html>