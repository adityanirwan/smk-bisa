<?php
include('../../system/akses_admin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../fragments-admin/header.php');
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include('../fragments-admin/nav.php');
        ?>

        <!-- Main Sidebar Container -->
        <?php
        include('../fragments-admin/sidebar.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Data Siswa</h1>
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
                                    <a href="tambahsiswa.php" class="btn btn-primary btn-sm">
                                        <i class="fas fa-user-plus"></i>
                                        Tambah data Siswa
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="15px">No</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No Hp</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // membaca data di database
                                            // menghubungkan php dengan koneksi database
                                            include '../../system/koneksi.php';

                                            $sql = "SELECT *
                                                    FROM tb_user
                                                    JOIN tb_siswa ON tb_siswa.id_user = tb_user.id_user";
                                            $query = mysqli_query($koneksi, $sql);
                                            $no = 1;

                                            while ($data_siswa = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data_siswa['nama_siswa'] ?></td>
                                                    <td><?= $data_siswa['kelas'] . " RPL" ?></td>
                                                    <td><?= $data_siswa['gender'] == 'L' ? 'Laki - Laki' : 'Perempuan' ?></td>
                                                    <td><?= $data_siswa['no_hp'] ?></td>
                                                    <td class="text-center">
                                                        <!-- <a href="" class="btn btn-success btn-sm mb-1">
                                                            <i class="fas fa-eye"></i>
                                                        </a> -->
                                                        <a href="editsiswa.php?id_user=<?= $data_siswa['id_user'] ?>" class="btn btn-warning btn-sm mb-1">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a href="hapus_proses.php?ids=<?= $data_siswa['id_siswa']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');">
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
        include('../fragments-admin/footer.php');
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