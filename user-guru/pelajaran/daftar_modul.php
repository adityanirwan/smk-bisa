<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');
$id_pel = "";
if (isset($_GET['idp'])) {
  $id_pel = $_GET['idp'];
}
// cari nama pelajaran
$sql_pel = "SELECT * FROM tb_pelajaran WHERE id_pelajaran = '$id_pel'";
$query_pel = mysqli_query($koneksi, $sql_pel);
$pelajaran = mysqli_fetch_array($query_pel);

// cari modul berdasarkan id
$sql = "SELECT * FROM tb_modul WHERE id_pelajaran = '$id_pel'";
$query = mysqli_query($koneksi, $sql);

// cek apakah ada kuis
$kuis = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
            <div class="col-6">
              <h1><?= $pelajaran['judul_pelajaran'] ?></h1>
            </div>
            <div class="col-6">
              <a href="tambah_modul.php?idp=<?= $id_pel ?>" class="btn btn-success float-right">
                Tambah Modul
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php while ($data_modul = mysqli_fetch_array($query)) { ?>
            <div class="row">
              <div class="col-12">
                <div class="card card-navy">
                  <div class="card-header">
                    <h3 class="card-title">Modul <?= $data_modul['nama_modul'] ?></h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Materi</th>
                          <th style="width: 40px">Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      $sql2 = "SELECT * FROM tb_materi WHERE id_modul = '$data_modul[id_modul]'";
                      $query2 = mysqli_query($koneksi, $sql2);
                      $no = 1;
                      ?>
                      <tbody>
                        <?php while ($data_materi = mysqli_fetch_array($query2)) { ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data_materi['judul_materi'] ?></td>
                            <td class="text-center" width="150px">
                              <?php if (!empty($data_materi['isi_materi'])) { ?>
                                <a href="view_materi.php?idp=<?= $id_pel ?>&idmt=<?= $data_materi['id_materi'] ?>&idmd=<?= $data_materi['id_modul'] ?>" class="btn btn-success btn-sm mb-1">
                                  <i class="fas fa-eye"></i>
                                </a>
                              <?php } ?>
                              <a href="edit_materi.php?idp=<?= $data_materi['id_pelajaran'] ?>&idmd=<?= $data_materi['id_modul'] ?>&idmt=<?= $data_materi['id_materi'] ?>" class="btn btn-warning btn-sm mb-1">
                                <i class="fas fa-pen"></i>
                              </a>
                              <a href="proses_materi.php?idp=<?= $data_materi['id_pelajaran'] ?>&hidmt=<?= $data_materi['id_materi']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');">
                                <i class="fas fa-trash"></i>
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- Kuis -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Kuis</th>
                          <th style="width: 40px">Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      $sql3 = "SELECT * FROM tb_kuis WHERE id_modul = '$data_modul[id_modul]'";
                      $query3 = mysqli_query($koneksi, $sql3);
                      $no = 1;
                      ?>
                      <tbody>
                        <?php while ($data_kuis = mysqli_fetch_array($query3)) {
                          if (empty($data_kuis)) {
                            $kuis = false;
                          } else {
                            $kuis = true;
                          }

                        ?>

                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data_kuis['judul'] ?></td>
                            <td class="text-center" width="150px">
                              <a href="../kuis/daftar_pertanyaan.php?idp=<?= $id_pel ?>&idks=<?= $data_kuis['id_kuis'] ?>" class="btn btn-success btn-sm mb-1">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="../kuis/edit_kuis.php?idp=<?= $data_modul['id_pelajaran'] ?>&idks=<?= $data_kuis['id_kuis'] ?>" class="btn btn-warning btn-sm mb-1">
                                <i class="fas fa-pen"></i>
                              </a>
                              <a href="../kuis/kuis_proses.php?idp=<?= $data_modul['id_pelajaran'] ?>&hidks=<?= $data_kuis['id_kuis']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');">
                                <i class="fas fa-trash"></i>
                              </a>
                            </td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    <a href="tambah_materi.php?idp=<?= $data_modul['id_pelajaran'] ?>&idmd=<?= $data_modul['id_modul'] ?>" class="btn btn-success">Tambah Materi</a>
                    <a href="edit_modul.php?idp=<?= $data_modul['id_pelajaran'] ?>&idmd=<?= $data_modul['id_modul'] ?>" class="btn btn-warning">Edit Modul</a>
                    <?php if ($kuis == false) { ?>
                      <a href="../kuis/tambah_kuis.php?idp=<?= $data_modul['id_pelajaran'] ?>&idmd=<?= $data_modul['id_modul'] ?>" class="btn btn-success">Tambah Kuis</a>
                    <?php } ?>
                    <a href="hasil_siswa.php?idp=<?= $data_modul['id_pelajaran'] ?>&idmd=<?= $data_modul['id_modul'] ?>" class="text-right btn btn-success">Lihat Hasil Siswa</a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>
      <!-- /.content -->
    </div>

    <?php
    include('../fragments-guru/footer.php');
    ?>

  </div>
  <!-- ./wrapper -->

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
</body>

</html>