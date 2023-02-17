<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Modul</title>
  <?php
  include('../../system/akses_admin.php');
  include('../fragments-admin/header.php');
  include '../../system/koneksi.php';
  $id_modul = "";
  $id_pel = "";
  if (isset($_GET['idmd']) && isset($_GET['idp'])) {
    $id_modul = $_GET['idmd'];
    $id_pel = $_GET['idp'];
  }
  // cari modul berdasarkan id
  $sql = "SELECT * FROM tb_modul WHERE id_modul = '$id_modul'";
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
        <form action="proses_materi.php" method="POST">
          <div class="card-header">
            <a href="materi.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-3 mt-2">Kembali</a>
          </div>
          <div class=" card-body">
            <?php while ($row = mysqli_fetch_array($query)) { ?>
              <input type="hidden" name="idmd" value="<?= $row['id_modul'] ?>">
              <input type="hidden" name="idp" value="<?= $row['id_pelajaran'] ?>">
              <div class="form-group">
                <label for="InputNama">Nama Mapel</label>
                <input type="text" class="form-control" id="InputNama" name="nama" placeholder="Masukkan Nama" value="<?= $row['nama_modul'] ?>" required>
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
    include('../fragments-admin/footer.php');
    ?>

  </div>
  <!-- ./wrapper -->

</body>

</html>