<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');
$id_ks = "";
$id_pel = "";
if (isset($_GET['idks'])) {
  $id_ks = $_GET['idks'];
  $id_pel = $_GET['idp'];
}
// set session untuk kembali ke daftar modul
$_SESSION['idp'] = $id_pel;


// membaca data di database
// menghubungkan php dengan koneksi database

$sql = "SELECT * FROM tb_pertanyaan JOIN tb_kuis ON tb_kuis.id_kuis = tb_pertanyaan.id_kuis WHERE tb_pertanyaan.id_kuis='$id_ks'";
$query = mysqli_query($koneksi, $sql);

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
            <div class="col-12">
              <h1>Daftar Pertanyaan</h1>
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
                  <a href="../pelajaran/daftar_modul.php?idp=<?= $_SESSION['idp'] ?>" class="btn btn-warning btn-sm">
                    Kembali
                  </a>
                  <a href="../kuis/tambah_pertanyaan.php?idks=<?= $id_ks ?>" class="btn btn-primary btn-sm">
                    Tambah
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="15px">No</th>
                        <th>Pertanyaan</th>
                        <th>List Jawaban</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $no = 1;
                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <?php
                        $query2 = mysqli_query($koneksi, "SELECT * FROM tb_jawaban WHERE id_pertanyaan= '$data[id_pertanyaan]'");
                        ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data['isi_pertanyaan'] ?></td>
                          <td>
                            <?php while ($row = mysqli_fetch_array($query2)) {
                            ?>
                              <?= $row['isi_jawaban'] ?>,
                            <?php } ?>
                          </td>
                          <td class="text-center">
                            <!-- <a href="edit_pertanyaan.php?idpr=<?= $data['id_pertanyaan'] ?>&idks=<?= $data['id_kuis'] ?>" class="btn btn-warning btn-sm mb-1">
                              <i class="fas fa-pen"></i>Edit
                            </a> -->
                            <a href="hapus_pertanyaan.php?hidks=<?= $data['id_kuis'] ?>&idp=<?= $id_pel ?>&hidpr=<?= $data['id_pertanyaan'] ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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