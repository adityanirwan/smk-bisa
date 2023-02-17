<?php include "view_materi_helper.php";
include "../../system/akses_siswa.php"; ?>

<?php
$sql_materi_load = "SELECT * FROM tb_materi WHERE id_materi = '$id_materi' ";

// load materi target
$query_m = mysqli_query($koneksi, $sql_materi_load);
$materi = mysqli_fetch_array($query_m);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../fragments-siswa/header.php');
  ?>
  <!-- Custom styles for this template -->
  <link href="../../assets/plugins/sticky-footer.css" rel="stylesheet">
</head>

<body>
  <!-- Begin page content -->
  <main role="main" class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6 text-left">
            <a href="daftar_modul.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-2 ">Kembali</a>
          </div>
          <?php if ($last) { ?>
            <div class="col-6 text-right">
              <a href="proses_materi.php?idmd=<?= $id_modul ?>&idmt=<?= $id_materi ?>" class="btn btn-success btn-sm mb-2 ">Selesai</a>
            </div>
          <?php } ?>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?= $materi['judul_materi'] ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?= $materi['isi_materi'] ?>
  </main>

  <footer class="footer">
    <div class="container">
      <?php
      $link_prev = "view_materi.php?idp=$id_pel&idmd=$id_modul&idmt=";
      $link_next = "view_materi.php?idp=$id_pel&idmd=$id_modul&idmt=";
      ?>

      <a href="<?= $prev != null ? ($link_prev . $prev) : null ?>"><button class="btn btn-primary" style="width:49%" <?= $prev == null ? 'disabled' : null ?>>Prev</button></a>


      <a href="<?= $next != null ? ($link_next . $next) : null ?>"><button class="btn btn-primary" style="width:49%" <?= $next == null ? 'disabled' : null ?>>Next</button></a>
    </div>
  </footer>
</body>

</html>