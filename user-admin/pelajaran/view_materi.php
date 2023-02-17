<?= include "view_materi_helper.php"; ?>

<?php
$sql_materi_load = "SELECT * FROM tb_materi WHERE id_materi = '$id_materi' ";

// load materi target
$query_m = mysqli_query($koneksi, $sql_materi_load);
$materi = mysqli_fetch_array($query_m);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php
  include('../fragments-admin/header.php');
  ?>
  <!-- Custom styles for this template -->
  <link href="../../assets/plugins/sticky-footer.css" rel="stylesheet">
</head>

<body>
  <!-- Begin page content -->
  <main role="main" class="container">
    <section class="content-header">
      <div class="container-fluid">
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
      $link_prev = "view_materi.php?idmd=$id_modul&idmt=";
      $link_next = "view_materi.php?idmd=$id_modul&idmt=";
      ?>
      <a href="<?= $prev != null ? ($link_prev . $prev) : null ?>" class="btn btn-primary" style="width:49%">Prev</a>


      <a href="<?= $next != null ? ($link_next . $next) : null ?>" class="btn btn-primary" style="width:49%">Next</a>
    </div>
  </footer>
</body>

</html>