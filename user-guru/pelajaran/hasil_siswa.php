<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');

$id_pel = null;
$id_md = null;
if (isset($_GET['idp']) && isset($_GET['idmd'])) {
  $id_pel = $_GET['idp'];
  $id_md = $_GET['idmd'];
}

// cari data modul
$sql_modul = "SELECT * FROM tb_modul WHERE id_modul='$id_md'";
$q_modul = mysqli_query($koneksi, $sql_modul);
$data_modul = mysqli_fetch_array($q_modul);

// cari id kuis
$sql_kuis = "SELECT * FROM tb_kuis WHERE id_modul='$id_md'";
$q_kuis = mysqli_query($koneksi, $sql_kuis);

$arr_id_kuis = array();
while ($data_kuis = mysqli_fetch_array($q_kuis)) {
  array_push($arr_id_kuis, $data_kuis['id_kuis']);
}
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
            <div class="col-sm-12">
              <h1>Hasil Kuis Siswa Modul <?= $data_modul['nama_modul'] ?></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="daftar_modul.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-2">Kembali</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <?php for ($i = 0; $i < count($arr_id_kuis); $i++) { ?>
                    <table id="example1" class="table table-bordered table-striped mb-2">
                      <thead>
                        <tr>
                          <th width="15px">No</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Nilai</th>
                          <th>Tanggal Kuis</th>
                          <!-- <th class="text-center">Aksi</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // membaca data di database

                        $sql = "SELECT tb_kuis_selesai.*,tb_siswa.* FROM tb_kuis_selesai JOIN tb_siswa ON tb_kuis_selesai.id_siswa = tb_siswa.id_siswa WHERE tb_kuis_selesai.id_kuis = '$arr_id_kuis[$i]'";
                        $query = mysqli_query($koneksi, $sql);
                        $no = 1;

                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_siswa'] ?></td>
                            <td width="35%"><?= $data['kelas'] ?></td>
                            <td><?= $data['nilai'] ?></td>
                            <td><?= $data['dt'] ?></td>
                            <!-- <td class="text-center">
                              <a href="daftar_modul.php?idp=<?= $data['id_pelajaran'] ?>" class="btn btn-success btn-sm mb-1">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="edit_pelajaran.php?idp=<?= $data['id_pelajaran'] ?>" class="btn btn-warning btn-sm mb-1">
                                <i class="fas fa-pen"></i>
                              </a>
                              <a href="proses_pelajaran.php?hidp=<?= $data['id_pelajaran']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');">
                                <i class="fas fa-trash"></i>
                              </a>
                            </td> -->
                          </tr>
                        <?php } ?>
                      </tbody>

                    </table>
                  <?php } ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <?php
    include('../fragments-guru/footer.php');
    ?>


  </div>
  <!-- ./wrapper -->

  <!-- DataTables  & Plugins -->
  <script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../assets/plugins/jszip/jszip.min.js"></script>
  <script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="assets/dist/js/demo.js"></script> -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
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