<?php include '../../system/koneksi.php';
include('../../system/akses_siswa.php');
// dapatkan id pelajaran yg akan di load
$id = "";
if (isset($_GET['idp'])) {
  $id = $_GET['idp'];
} else {
  // die('akses dilarang');
}
// pertama cari dulu modul dan deskripsi
$sql1 = "SELECT * FROM tb_pelajaran WHERE id_pelajaran='$id'";
$query_pel = mysqli_query($koneksi, $sql1);
$data_pel = mysqli_fetch_assoc($query_pel);

// kedua cari bab - bab yang ada untuk id pelajaran tersebut
$sql2 = "SELECT * FROM tb_modul WHERE id_pelajaran='$id'";
$query_md = mysqli_query($koneksi, $sql2);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Materi Pembelajaran</title>
  <?php
  include('../fragments-siswa/header.php');
  ?>
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('../fragments-siswa/nav.php');
    ?>

    <!-- Main Sidebar Container -->
    <?php
    include('../fragments-siswa/sidebar.php');
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $data_pel['judul_pelajaran'] ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Materi</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- ini judul modul -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><?= $data_pel['judul_pelajaran'] ?></h3>

                </div>

                <div class="card-body">
                  <?= $data_pel['desc_pelajaran'] != null ? $data_pel['desc_pelajaran'] : null ?>
                </div>

              </div>

              <!-- ini bab -->
              <?php while ($row1 = mysqli_fetch_array($query_md)) { ?>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?= $row1['nama_modul'] ?></h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <?php
                  // ketiga cari materi materi yang ada untuk id modul dan sesuai mapel tersebut
                  $sql3 = "SELECT * FROM tb_materi WHERE id_pelajaran='$id' AND id_modul='$row1[id_modul]'";
                  $query_materi = mysqli_query($koneksi, $sql3);
                  ?>

                  <div class="card-body">
                    <!-- ini materi -->
                    <?php
                    $i = 0;
                    while ($row3 = mysqli_fetch_array($query_materi)) {
                    ?>
                      <div class="col-4">
                        <div class="card">
                          <div class="card-body">
                            <?= $row3['judul_materi'] ?>
                          </div>
                          <div class="card-footer">
                            <a href="view_materi.php?idmt=<?= $row3['id_materi'] ?>&idmd=<?= $row3['id_modul'] ?>" class="btn btn-primary btn-sm">Lihat</a>
                          </div>
                        </div>
                      </div>

                    <?php $i++;
                    }  ?>

                    <?php
                    $sql4 = "SELECT * FROM tb_kuis WHERE id_modul = '$row1[id_modul]' LIMIT 1";
                    $query_ks = mysqli_query($koneksi, $sql4);
                    while ($data_kuis = mysqli_fetch_array($query_ks)) { ?>
                      <div class="col-4">
                        <div class="card">
                          <div class="card-body">
                            Kuis <?= $data_kuis['nomor'] ?>
                          </div>
                          <div class="card-footer">
                            <a href="view_kuis_utama.php?idp=<?= $id ?>&idmd=<?= $row1['id_modul'] ?>" class="btn btn-primary btn-sm">Lihat</a>
                          </div>
                        </div>
                      </div>

                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  </div>

  <!-- jQuery -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>

</body>

</html>