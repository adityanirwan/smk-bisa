<?php
include('../../system/akses_siswa.php');
include('../../system/koneksi.php');

// ambil data kuis dan modul
if (isset($_GET['idp']) && isset($_GET['idmd']) && isset($_GET['idks'])) {
  $id_pel = $_GET['idp'];
  $id_md = $_GET['idmd'];
  $id_kuis = $_GET['idks'];
}
$id_user = $_SESSION['id_user'];
// daftar pelajaran
$sql = "SELECT * FROM tb_kuis WHERE id_modul = '$id_md'";
$query = mysqli_query($koneksi, $sql);
$data_kuis = mysqli_fetch_array($query);

// cari jawaban benar 
// cari hanya jawaban benar
$sql_nilai = "SELECT * FROM `tb_jawaban` JOIN tb_jawaban_tersimpan ON tb_jawaban.id_jawaban = tb_jawaban_tersimpan.id_jawaban WHERE  tb_jawaban_tersimpan.id_user='$id_user' AND tb_jawaban.benar = '1'";
$query_nilai = mysqli_query($koneksi, $sql_nilai);
$jml_jawaban_benar = mysqli_num_rows($query_nilai);

// untuk mengambil pertanyaan dan jawaban harus tau dulu ada berapa pertanyaan
$cari_jumlah_pertanyaan = "SELECT COUNT(id_pertanyaan) as jumlah_pertanyaan FROM tb_pertanyaan WHERE id_kuis='$id_kuis' ";
$query = mysqli_query($koneksi, $cari_jumlah_pertanyaan);
$rs_jml_pertanyaan = mysqli_fetch_array($query);
$jml_pertanyaan = $rs_jml_pertanyaan['jumlah_pertanyaan'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../fragments-siswa/header.php');
  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
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
            <div class="col-6">
              <h1>Kuis <?= $data_kuis['judul'] ?></h1>
              <a class="btn btn-warning btn-sm" href="daftar_modul.php?idp=<?= $id_pel ?>">Kembali</a>
            </div>
            <div class="col-6">
              <!-- <a href="tambahpelajaran.php" class="btn btn-success float-right">
                Tambah Pelajaran
              </a> -->
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row align-items-stretch">
            <div class="col-12">
              <div class="card mb-2">

                <div class="card-header">
                  Kisi Kisi Kuis
                </div>
                <div class="card-body">
                  <div class="text-justify"><?= $data_kuis['deskripsi_kuis'] ?>
                  </div>
                  <!-- history kuis -->
                  <label for="example1">Hasil Sebelumnya</label>
                  <div class="row">
                    <div class="col-6 text-center">
                      <h5>Jawaban Benar</h5>
                      <div style="height:200px;">
                        <p style="font-size:10vh"><?= $jml_jawaban_benar ?></p>
                      </div>
                    </div>
                    <div class="col-6 text-center">
                      <h5>Total Soal</h5>
                      <div style="height:200px;">
                        <p style="font-size:10vh"><?= $jml_pertanyaan ?></p>
                      </div>
                    </div>
                  </div>
                  <label for="#">Waktu Pengerjaan</label>
                  <h5><?= $data_kuis['waktu'] ?> Menit</h5>
                </div>
                <div class="card-footer">


                  <!-- button mulai kuis -->
                  <a href="view_kuis_utama.php?idp=<?= $id_pel ?>&idmd=<?= $id_md ?>" class="btn btn-primary">Mulai Kuis</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>

    <?php
    include('../fragments-siswa/footer.php');
    ?>

  </div>
  <!-- ./wrapper -->


  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>
</body>

</html>