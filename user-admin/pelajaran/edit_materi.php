<?php
include "../../system/koneksi.php";
include "../../system/akses_admin.php";
$id_pel = "";
$id_md = "";
$id_materi = "";
if (isset($_GET['idp']) && isset($_GET['idmd']) & isset($_GET['idmt'])) {
  $id_pel = $_GET['idp'];
  $id_md = $_GET['idmd'];
  $id_materi = $_GET['idmt'];
}
// cari materinya
$sql = "SELECT * FROM tb_materi WHERE id_pelajaran ='$id_pel' AND id_modul='$id_md' AND id_materi= '$id_materi'";
$query = mysqli_query($koneksi, $sql);
$data_materi = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Materi</title>
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
            <div class="col-sm-6">
              <h1>Edit Materi</h1>

            </div>
            <div class="col-sm-6 mb-4">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Materi</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main Section -->
      <!-- general form elements -->
      <div class="card card-primary col-12">
        <!-- form start -->
        <form action="proses_materi.php" method="POST">
          <div class="card-header">
            <a href="materi.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-3 mt-2">Kembali</a>
          </div>
          <div class=" card-body">
            <input type="hidden" name="idp" value="<?= $id_pel ?>">
            <input type="hidden" name="idmd" value="<?= $id_md ?>">
            <input type="hidden" name="idmt" value="<?= $id_materi ?>">
            <div class="form-group">
              <label for="InputMateri">Judul Materi</label>
              <input type="text" class="form-control" id="InputMateri" name="judul" placeholder="Masukkan Judul Materi" value="<?= $data_materi['judul_materi'] ?>" required readonly>
            </div>
            <div class="form-group">
              <label for="isi">Isi Materi</label>
              <textarea id="summernote" name="isi_materi"><?= $data_materi['isi_materi'] != null ? $data_materi['isi_materi'] : null ?></textarea>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="editmateri">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

      <!-- general form elements -->
      <!-- End of Main Section -->
    </div>
    <?php
    include('../fragments-admin/footer.php'); ?>
    <script>
      $(function() {
        // Summernote
        $('#summernote').summernote({
          height: 300, // set editor height
        })
      })
    </script>

  </div>
  <!-- ./wrapper -->

</body>

</html>