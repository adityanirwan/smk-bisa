<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');
$id_kuis = null;
$id_md = null;
if (isset($_GET['idmd']) && isset($_GET['idks'])) {
  $id_kuis = $_GET['idks'];
  $id_md = $_GET['idmd'];
}
// cari soalnya
$sql = "SELECT * FROM tb_kuis WHERE id_kuis = '$id_kuis'";
$query = mysqli_query($koneksi, $sql);
$datakuis = mysqli_fetch_array($query);
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
              <h1>Tambah Jawaban</h1>
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
                  <div class="card-header bg-primary">
                    <h4 class="card-title">Tambah Jawaban </h4>
                    <!-- <h3 class="card-title">Judul</h3> -->
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="idmd" value="<?= $id_md ?>">
                    <input type="hidden" name="idks" value="<?= $id_kuis ?>">
                    <div class="form-group row">
                      <label for="InputSoal" class="col-sm-3 col-form-label">Soal</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputSoal" name="soal" class="form-control" value="<?= $datakuis['isi_soal'] ?>" readonly required>
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
                    <button type="submit" class="btn btn-primary" name="tambahjawaban">Tambah</button>
                    <a href="daftar_pertanyaan.php?idmd=<?= $id_md ?>" class="btn btn-secondary float-right">Batal</a>
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
</body>

</html>