<?php
include('../../system/akses_siswa.php');
include('../../system/koneksi.php');

// daftar pelajaran
$sql = "SELECT * FROM tb_pelajaran";
$query = mysqli_query($koneksi, $sql);

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
              <h1>Pelajaran</h1>
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

            <?php while ($data = mysqli_fetch_array($query)) { ?>
              <div class="col-12 col-sm-4 d-flex">
                <div class="card w-100">
                  <div class="card-body pb-0">
                    <h5 class="font-weight-bold"><?= $data['judul_pelajaran'] ?></h5>
                    <p><?= $data['desc_pelajaran'] ?></p>
                  </div>
                  <div class="card-footer">
                    <a href="daftar_modul.php?idp=<?= $data['id_pelajaran'] ?>" class="btn btn-success">View More</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- <div class="col-sm-4">
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="font-weight-bold">C++</h5>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, consequuntur!</p>
                </div>
                <div class="card-footer">
                  <a href="" class="btn btn-success">View More</a>
                </div>
              </div>
            </div>
             -->
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