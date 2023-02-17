<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');
$id_ks = null;
if (isset($_GET['idks'])) {
  $id_ks = $_GET['idks'];
}
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
              <h1>Tambah Pertanyaan</h1>
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
                    <div class="form-group row">
                      <label for="InputSoal" class="col-sm-3 col-form-label">Soal</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputSoal" name="soal" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputJawaban1" class="col-sm-3 col-form-label">Jawaban Pertama <small>Jawaban Benar</small> </label>
                      <div class="col-sm-9">
                        <input type="text" id="InputJawaban1" name="jawaban1" placeholder="Jawaban Untuk Kuis" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputJawaban2" class="col-sm-3 col-form-label">Jawaban Kedua</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputJawaban2" name="jawaban2" placeholder="Jawaban Untuk Kuis" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputJawaban3" class="col-sm-3 col-form-label">Jawaban Ketiga</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputJawaban3" name="jawaban3" placeholder="Jawaban Untuk Kuis" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputJawaban4" class="col-sm-3 col-form-label">Jawaban Keempat</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputJawaban4" name="jawaban4" placeholder="Jawaban Untuk Kuis" class="form-control" required>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="tambahpertanyaan">Tambah</button>
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