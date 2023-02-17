<?php
include('../../system/akses_guru.php');
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
              <h1>Daftar Kuis</h1>
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
                  <!-- <a href="tambahguru.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus"></i>
                    Tambah data Guru
                  </a> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="15px">No</th>
                        <th>Pelajaran</th>
                        <th>Modul</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // membaca data di database
                      // menghubungkan php dengan koneksi database
                      include '../../system/koneksi.php';

                      $sql = "SELECT * FROM tb_modul JOIN tb_pelajaran ON tb_modul.id_pelajaran = tb_pelajaran.id_pelajaran";
                      $query = mysqli_query($koneksi, $sql);
                      $no = 1;

                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data['judul_pelajaran'] ?></td>
                          <td><?= $data['nama_modul'] ?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-primary mb-1" href="daftar_pertanyaan.php?idmd=<?= $data['id_modul'] ?>"><i class="fas fa-eye"></i></a>
                            <a href="tambah_kuis.php?idp=<?= $data['id_pelajaran'] ?>&idmd=<?= $data['id_modul'] ?>" class="btn btn-success btn-sm mb-1">
                              <i class="fas fa-plus"></i>
                            </a>
                            <a href="" class="btn btn-warning btn-sm mb-1">
                              <i class="fas fa-pen"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');">
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
</body>

</html>