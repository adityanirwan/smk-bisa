<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');
$id_pr = null;
if (isset($_GET['idpr']) && isset($_GET['idks'])) {
  $id_ks = $_GET['idks'];
  $id_pr = $_GET['idpr'];
}
// cari pertanyaanya
$sql = "SELECT * FROM tb_pertanyaan JOIN tb_jawaban ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.id_pertanyaan = '$id_pr'";
$query = mysqli_query($koneksi, $sql);
$data_soal = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../fragments-guru/header.php');
  // if (isset($_GET['statususername'])) {
  //     if ($_GET['statususername'] == 'gagal') {
  //         $username_err = true;
  //     }
  // } else {
  //     $username_err = false;
  // }
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
            <div class="col-sm-12">
              <h1>Edit Pertanyaan</h1>
            </div>
          </div>
        </div>
      </section>

      <!-- Main Section -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <form action="kuis_proses.php" method="POST">
                <div class="card">
                  <div class="card-header">
                    <a href="daftar_pertanyaan.php?idp=<?= $_SESSION['idp'] ?>&idks=<?= $id_ks ?>" class=" btn btn-warning btn-sm">
                      Kembali
                    </a>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="idp" value="<?= $_SESSION['idp'] ?>">
                    <input type="hidden" name="idks" value="<?= $id_ks ?>">
                    <input type="hidden" name="idpr" value="<?= $id_pr ?>">
                    <div class="form-group row">
                      <label for="InputSoal" class="col-sm-3 col-form-label">Soal</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputSoal" name="soal" class="form-control" value="<?= $data_soal['isi_pertanyaan'] ?>" required>
                      </div>
                    </div>
                    <?php
                    mysqli_data_seek($query, 0);
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) { ?>
                      <div class="form-group row">
                        <label for="InputJawaban1" class="col-sm-3 col-form-label">Jawaban <?= $no ?> <?= $no == 1 ? '<small>Jawaban Benar</small>' : null ?> </label>
                        <div class="col-sm-9">
                          <input type="text" id="InputJawaban1" name="jawaban<?= $no ?>" placeholder="Jawaban Untuk Kuis" class="form-control" value="<?= $data['isi_jawaban'] ?>" required>
                        </div>
                      </div>
                    <?php $no++;
                    } ?>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="editpertanyaan">Edit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End of Main Section -->
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