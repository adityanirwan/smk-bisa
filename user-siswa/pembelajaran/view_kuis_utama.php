<?php include '../../system/koneksi.php';
include('../../system/akses_siswa.php');
// dapatkan id pelajaran yg akan di load
$id_md = "";
$waktu = "";
if (isset($_GET['idmd']) && isset($_GET['idp'])) {
  $id_md = $_GET['idmd'];
  $id_pel = $_GET['idp'];
} else {
  // die('akses dilarang');
}

// cari id kuis berdasarkan id modul
$sqlkuis = "SELECT * FROM tb_kuis WHERE id_modul = '$id_md'";
$querykuis = mysqli_query($koneksi, $sqlkuis);
$datakuis = mysqli_fetch_array($querykuis);

// set waktu ke variabel
$waktu = $datakuis['waktu'];

$sqlpertanyaan = "SELECT * FROM tb_pertanyaan WHERE id_kuis = '$datakuis[id_kuis]'";
$query = mysqli_query($koneksi, $sqlpertanyaan);

// cari data pelajaran untuk view
$sql2 = "SELECT * FROM tb_pelajaran WHERE id_pelajaran = '$id_pel'";
$query2 = mysqli_query($koneksi, $sql2);
$data_pel = mysqli_fetch_array($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuis</title>
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
              <h1>Kuis <?= $data_pel['judul_pelajaran'] ?></h1>
              <a class="btn btn-warning btn-sm" href="daftar_modul.php?idp=<?= $id_pel ?>">Kembali</a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kuis</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <form action="proses_simpan_kuis.php" METHOD="POST">
            <div class="col-12">
              <div class="card p-3">
                <input type="hidden" name="idp" value="<?= $id_pel ?>">
                <input type="hidden" name="idmd" value="<?= $id_md ?>">
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                <input type="hidden" name="id_kuis" value="<?= $datakuis['id_kuis'] ?>">
                <div class="card-header">
                  <div class="card-title">Waktu Tersisa <strong><span id='timer' class='mx-1'>00:00</span></strong></div>
                </div>
                <!-- Pertanyaan Kuis -->
                <?php
                $no = 1;

                while ($row1 = mysqli_fetch_array($query)) { ?>
                  <div class="row">
                    <div class=" col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"><?= $no ?>. <?= $row1['isi_pertanyaan'] ?></h3>
                          <input type="hidden" name="id_pertanyaan<?= $no ?>" value=<?= $row1['id_pertanyaan'] ?>>
                        </div>
                        <?php
                        // cari jawaban berdasarkan id pertanyaan tersebut
                        $sql3 = "SELECT * FROM tb_jawaban WHERE id_pertanyaan='$row1[id_pertanyaan]'";
                        $query_jawaban = mysqli_query($koneksi, $sql3);
                        ?>
                        <!-- jawaban -->
                        <div class="card-body">
                          <div class="btn-group-toggle" data-toggle="buttons">
                            <?php
                            $i = 0;
                            while ($row3 = mysqli_fetch_array($query_jawaban)) {
                              $arr_pilihan = range('A', 'D');
                              echo "<label class='btn bg-olive mb-2'> {$arr_pilihan[$i]}";
                              echo "<input type='radio' id='jawaban$no' name='jawaban$no' autocomplete='off' value='$row3[id_jawaban]' required></label><label for='jawaban$no' class='mx-2'>$row3[isi_jawaban]</label> <br>";
                              $i++;
                            }


                            ?>



                          </div>
                        </div>

                      </div>


                    </div>
                  </div>
                <?php
                  $no++;
                }  ?>
                <!-- /.col -->

                <!-- /.row -->
              </div>
            </div>

            <div class="text-center mt-2 mb-2">
              <button class="btn btn-primary" id="submitkuis" name="simpankuis" type="submit">Selesaikan</button>
            </div>
          </form>
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

<script>
  const waktuAwal = <?= $waktu ?>;
  let waktu = waktuAwal * 60;

  const timerEl = document.getElementById('timer');
  let intervalID;

  intervalID = setInterval(updateTimer, 1000);


  function updateTimer() {
    const menit = Math.floor(waktu / 60);
    let detik = waktu % 60;

    detik = detik < 10 ? '0' + detik : detik;
    timerEl.innerHTML = `${menit}:${detik}`;
    waktu--;
    if (waktu == 0 || waktu < 0) {
      clearInterval(intervalID);
      timerEl.innerHTML = `00:00`;
      document.getElementById("submitkuis").click();
    }
  }
</script>

</html>